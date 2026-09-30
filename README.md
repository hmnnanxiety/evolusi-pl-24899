@'
# Evolusi Perangkat Lunak

Repository praktikum mata kuliah Konstruksi dan Evolusi Perangkat Lunak.

## Identitas

- Nama: Dimas Satria Widjatmiko
- NIM: 24/541372/SV/24899
- Kelas: AA

## Techstack

- Laravel 12
- PHP 8.3
- Git dan GitHub
- GitHub Actions

## Branching Strategy

Pengembangan menggunakan alur:

    main
    └── dev
        └── feature/laravel-homepage

Perubahan dari branch feature digabungkan ke `dev` melalui Pull Request, kemudian `dev` digabungkan ke `main` melalui Pull Request.

## Continuous Integration

Workflow GitHub Actions berada pada:

    .github/workflows/ci.yml

Workflow menjalankan dua job:

1. Build Laravel
2. Run Tests
'@ | Set-Content README.md