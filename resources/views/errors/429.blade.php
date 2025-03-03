@extends('errors::minimal')

@section('title', __('Terlalu banyak permintaan'))
@section('code', '429')
@section('message', __('Server sedang sibuk, silahkan kembali lagi nanti'))
