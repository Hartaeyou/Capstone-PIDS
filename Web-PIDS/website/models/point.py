# models/point.py
from flask import current_app
import mysql.connector

class Point:
    def __init__(self, id_point, nama_stasiun, latitude_stasiun, longtitude_stasiun):
        self.id_point = id_point  # Atribut untuk kolom 'id'
        self.nama_stasiun = nama_stasiun  # Atribut untuk kolom 'name'
        self.latitude_stasiun = latitude_stasiun  # Atribut untuk kolom 'latitude'
        self.longtitude_stasiun = longtitude_stasiun  # Atribut untuk kolom 'longitude'

    @staticmethod
    def get_all_points():
        connection = mysql.connector.connect(
            host=current_app.config['MYSQL_HOST'],
            user=current_app.config['MYSQL_USER'],
            password=current_app.config['MYSQL_PASSWORD'],
            database=current_app.config['MYSQL_DB']
        )
        cursor = connection.cursor(dictionary=True)
        cursor.execute('SELECT * FROM point')  # Ganti dengan nama tabel Anda
        points = cursor.fetchall()
        cursor.close()
        connection.close()
        return [Point(**point) for point in points]  # Menggunakan unpacking untuk menginisialisasi objek