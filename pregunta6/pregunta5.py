from tkinter import Tk, Label, Entry, ttk, LabelFrame
from tkcalendar import Calendar,DateEntry
import pymysql.cursors
from datetime import datetime
import random

class Persona:
    def __init__(self,window):
        self.window = window
        self.window.title("Registro Datos")
        macro = LabelFrame(self.window,text="Ingrese datos")
        macro.grid(row=0,column=0,columnspan=3,pady=20,padx=20)
        Label(macro,text="Nombre: ").grid(row=0,column=0,pady=5,padx=5)
        self.name = Entry(macro)
        self.name.grid(row=0,column=1,pady=5,padx=5)
        Label(macro,text="Apellido: ").grid(row=1,column=0,pady=5,padx=5)
        self.last_name = Entry(macro)
        self.last_name.grid(row=1,column=1,pady=5,padx=5)
        Label(macro,text="Fecha de nacimiento: ").grid(row=2,column=0,pady=5,padx=5)
        self.date = DateEntry(macro,width=16,bg="darkblue",fg="white",year=2000,date_pattern="yyyy-mm-dd")
        self.date.grid(row=2,column=1)
        Label(macro,text="Departamento: ").grid(row=3,column=0,pady=5,padx=5)
        self.depto = Entry(macro)
        self.depto.grid(row=3,column=1,pady=5,padx=5)
        Label(macro,text="CI: ").grid(row=4,column=0,pady=5,padx=5)
        self.ci = Entry(macro)
        self.ci.grid(row=4,column=1,pady=5,padx=5)
        ttk.Button(macro,text="Guardar",command=self.add_data).grid(row=5,columnspan=2,pady=10,padx=5)
        self.message = Label(text="",fg="red")
        self.message.grid(row=5,column=0,columnspan=2)
        
        self.table=ttk.Treeview(self.window,columns=[f"#{n}" for n in range(1, 5)])        
        self.table.grid(row=6,column=0,columnspan=2,pady=10,padx=5)
        self.table.heading("#0",text="CI", anchor ='c')
        self.table.heading("#1",text="Nombre", anchor ='c')
        self.table.heading("#2",text="Apellido", anchor ='c')
        self.table.heading("#3",text="Fecha nacimiento", anchor ='c')
        self.table.heading("#4",text="Departamento", anchor ='c')
        
        self.connection = pymysql.connect(host='localhost',
                             user='alvaro',
                             password='',
                             database='mibdalvaro',
                             cursorclass=pymysql.cursors.DictCursor)
        self.cursor = self.connection.cursor()
    
    def get_data(self):
        records=self.table.get_children()
        for record in records:
            self.table.delete(record)
        sql = "SELECT `*` FROM `persona`"
        
        try:
            self.cursor.execute(sql)
            users = self.cursor.fetchall()
            for user in users:
                name = user['nombre'].split(' ')
                depto = ''
                if user['depto'] == '01':
                	depto = "Chuquisaca"
                elif user['depto'] == '02':
                	depto = "La Paz"
                elif user['depto'] == '03':
                	depto = "Cochabamba"
                elif user['depto'] == '04':
                	depto = "Oruro"
                elif user['depto'] == '05':
                	depto = "Potosi"
                elif user['depto'] == '06':
                	depto = "Tarija"
                elif user['depto'] == '07':
                	depto = "Santa Cruz"
                elif user['depto'] == '08':
                	depto = "Beni"
                elif user['depto'] == '09':
                	depto = "Pando"
                else:
                	depto = "No Existe"
                
                self.table.insert('', 0,text=user['ci'],values=(name[0],name[1],user['fechaNac'],depto))

        except Exception as e:
            raise
    
    def add_data(self):
        if len(self.name.get())!=0 and len(self.date.get())!=0 and len(self.depto.get())!=0 and len(self.ci.get())!=0:
            
            name = self.name.get()+" "+self.last_name.get()
            depto = ''
            if self.depto.get().title() == "Chuquisaca" or self.depto.get().title() == "Sucre":
                depto = '01'
            elif self.depto.get().title() == "La Paz":
                depto = '02'
            elif self.depto.get().title() == "Cochabamba":
                depto = '03'
            elif self.depto.get().title() == "Oruro":
                depto = '04'
            elif self.depto.get().title() == "Potosi":
                depto = '05'
            elif self.depto.get().title() == "Tarija":
                depto = '06'
            elif self.depto.get().title() == "Santa Cruz":
                depto = '07'
            elif self.depto.get().title() == "Beni":
                depto = '08'
            elif self.depto.get().title() == "Pando":
                depto = '09'
            else:
                depto = "00"
            
            name2 = self.name.get().lower()[0]+""+self.last_name.get().lower()
            car = random.randrange(1, 6)
            sql = "INSERT INTO `persona`(`ci`, `nombre`, `fechaNac`, `depto`) VALUES ({},'{}','{}','{}')".format(self.ci.get(), name.title(),self.date.get(), depto)
            sql2="INSERT INTO `usuario`(`ci`, `usuario`, `password`, `rol`, `carrera`) VALUES ({},'{}','{}',{},{})".format(self.ci.get(), name2,self.ci.get() , 0, car)
            try:
                self.cursor.execute(sql)
                self.connection.commit()
                self.cursor.execute(sql2)
                self.connection.commit()
            except Exception:
                raise
        else:
            self.message["text"] = "Campos Vacios"
        self.get_data()
        self.name.delete(0,"end")
        self.last_name.delete(0,"end")
        self.date.delete(0,"end")
        self.depto.delete(0,"end")
        self.ci.delete(0,"end")
    def close(self):
        self.connection.close()
    
    
window = Tk()
app = Persona(window)
app.get_data()
window.mainloop()