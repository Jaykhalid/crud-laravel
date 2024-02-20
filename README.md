Project: Generate Pembayaran Dinamis

Deskripsi:

Project ini bertujuan untuk mendemonstrasikan cara generate baris data pembayaran secara dinamis berdasarkan nilai input total.

Fitur:

    Generate baris data pembayaran dengan total maksimal 100.000 per baris.
    Menghitung fee (jika type_id = TYPE2) dengan maksimal 20.000 per baris.
    Mendukung generate multiple baris data berdasarkan total input.
    Menggunakan looping yang efektif dan efisien.

Teknologi:

    Laravel
    PHP

Cara Penggunaan:

    Clone project ini ke dalam local machine Anda.
    Instal Laravel dan dependensi lainnya.
    Konfigurasikan database Anda.
    Jalankan php artisan migrate untuk membuat tabel database.
    Jalankan php artisan serve untuk memulai server.
    Kirim request POST ke endpoint API dengan data pembayaran (payment_id, type_id, date, total).
    Periksa database untuk melihat baris data pembayaran yang telah dibuat.

Contoh Request:
JSON

`{
    "payment_id": "PAY-123456",
    "type_id": "TYPE2",
    "date": "2023-11-14",
    "total": 350000
}`

Contoh Response:
JSON

[
    {
        "id": 1,
        "payment_id": "PAY-123456",
        "type_id": "TYPE2",
        "date": "2023-11-14",
        "total": 100000,
        "fee": 20000,
        "created_at": "2023-11-14T12:00:00.000Z",
        "updated_at": "2023-11-14T12:00:00.000Z"
    },
    {
        "id": 2,
        "payment_id": "PAY-123456",
        "type_id": "TYPE2",
        "date": "2023-11-14",
        "total": 100000,
        "fee": 20000,
        "created_at": "2023-11-14T12:00:00.000Z",
        "updated_at": "2023-11-14T12:00:00.000Z"
    },
    {
        "id": 3,
        "payment_id": "PAY-123456",
        "type_id": "TYPE2",
        "date": "2023-11-14",
        "total": 50000,
        "fee": 10000,
        "created_at": "2023-11-14T12:00:00.000Z",
        "updated_at": "2023-11-14T12:00:00.000Z"
    }
]

