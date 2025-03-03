@extends('errors::minimal')

@section('title', __('Akses tidak diizinkan'))
@section('code', '401')
@section('message', __('Anda harus login terlebih dahulu untuk mengakses halaman ini'))
