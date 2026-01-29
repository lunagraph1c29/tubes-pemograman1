@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <h1 style="font-size: 2rem; font-weight: bold;">Dashboard</h1>
    <div style="color: #666;">
        📅 {{ date('d F Y') }}
    </div>
</div>

<!-- STATS CARDS -->
<div class="grid grid-3" style="margin-bottom: 30px;">
    <div class="card stat-card primary">
        <div class="card-body">
            <div class="stat-content">
                <div>
                    <div style="color: #666; margin-bottom: 8px;">Total Produk</div>
                    <div style="font-size: 2rem; font-weight: bold;">{{ $totalProducts }}</div>
                </div>
                <div class="stat-icon">📦</div>
            </div>
        </div>
    </div>
    
    <div class="card stat-card success">
        <div class="card-body">
            <div class="stat-content">
                <div>
                    <div style="color: #666; margin-bottom: 8px;">Produk Aktif</div>
                    <div style="font-size: 2rem; font-weight: bold;">{{ $activeProducts }}</div>
                </div>
                <div class="stat-icon" style="color: #28a745;">✓</div>
            </div>
        </div>
    </div>
    
    <div class="card stat-card warning">
        <div class="card-body">
            <div class="stat-content">
                <div>
                    <div style="color: #666; margin-bottom: 8px;">Total Kategori</div>
                    <div style="font-size: 2rem; font-weight: bold;">{{ $totalCategories }}</div>
                </div>
                <div class="stat-icon" style="color: #ffc107;">🏷️</div>
            </div>
        </div>
    </div>
</div>

<!-- QUICK ACTIONS & SUMMARY -->
<div class="grid grid-2">
    <div class="card">
        <div class="card-header">
            <h3>📊 Ringkasan</h3>
        </div>
        <div class="card-body">
            <table style="width: 100%; border-collapse: collapse;">
                <tr style="border-bottom: 1px solid #f0f0f0;">
                    <td style="padding: 15px 0;">📦 Total Produk</td>
                    <td style="padding: 15px 0; text-align: right; font-weight: bold;">{{ $totalProducts }}</td>
                </tr>
                <tr style="border-bottom: 1px solid #f0f0f0;">
                    <td style="padding: 15px 0;">✓ Produk Aktif</td>
                    <td style="padding: 15px 0; text-align: right; font-weight: bold; color: #28a745;">{{ $activeProducts }}</td>
                </tr>
                <tr style="border-bottom: 1px solid #f0f0f0;">
                    <td style="padding: 15px 0;">✗ Produk Nonaktif</td>
                    <td style="padding: 15px 0; text-align: right; font-weight: bold; color: #dc3545;">{{ $totalProducts - $activeProducts }}</td>
                </tr>
                <tr>
                    <td style="padding: 15px 0;">🏷️ Total Kategori</td>
                    <td style="padding: 15px 0; text-align: right; font-weight: bold;">{{ $totalCategories }}</td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h3>⚡ Aksi Cepat</h3>
        </div>
        <div class="card-body">
            <div style="display: grid; gap: 10px;">
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary" style="text-align: center; text-decoration: none;">
                    ➕ Tambah Produk
                </a>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-success" style="text-align: center; text-decoration: none;">
                    ➕ Tambah Kategori
                </a>
                <a href="{{ route('admin.settings.index') }}" class="btn" style="background: #17a2b8; color: white; text-align: center; text-decoration: none;">
                    ⚙️ Pengaturan Website
                </a>
                <a href="{{ route('home') }}" target="_blank" class="btn" style="background: white; border: 2px solid #667eea; color: #667eea; text-align: center; text-decoration: none;">
                    🌐 Lihat Website
                </a>
            </div>
        </div>
    </div>
</div>

<!-- WELCOME MESSAGE -->
<div class="card" style="margin-top: 30px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
    <div class="card-body">
        <h2 style="margin-bottom: 10px;">👋 Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p style="margin: 0; opacity: 0.9;">Kelola produk dan website Anda dengan mudah melalui dashboard admin ini.</p>
    </div>
</div>
@endsection
