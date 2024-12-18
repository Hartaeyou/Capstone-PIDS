# models/kereta.py
from flask import current_app
import mysql.connector

class Kereta:
    def __init__(self, id_kereta, nama_kereta, kode_kereta, nama_rute):
        self.id_kereta = id_kereta  # Atribut untuk kolom 'id'
        self.nama_kereta = nama_kereta  # Atribut untuk kolom 'name'
        self.kode_kereta = kode_kereta  # Atribut untuk kolom 'rute_id'
        self.nama_rute = nama_rute

    @staticmethod
    def get_all_keretas():
        connection = mysql.connector.connect(
            host=current_app.config['MYSQL_HOST'],
            user=current_app.config['MYSQL_USER'],
            password=current_app.config['MYSQL_PASSWORD'],
            database=current_app.config['MYSQL_DB']
        )
        cursor = connection.cursor(dictionary=True)
        cursor.execute('SELECT * FROM kereta')  # Ganti dengan nama tabel Anda
        keretas = cursor.fetchall()
        cursor.close()
        connection.close()
        return [Kereta(**kereta) for kereta in keretas]  # Menggunakan unpacking untuk menginisialisasi objek