@extends('layouts.app')

@section('content')

<head>
  <script src="https://cdn.tailwindcss.com"></script>
</head>


<div class="max-w-6xl mx-auto p-6 bg-gray-100 min-h-screen">
    <div class="flex items-center justify-between mb-4">
        <div class="relative w-1/3">
            <input type="text" placeholder="Search" class="w-full border rounded-lg p-3 pl-10 shadow-sm focus:ring-2 focus:ring-gray-300">
            <svg class="absolute left-3 top-3 text-gray-400 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10 17a7 7 0 1 1 0-14 7 7 0 0 1 0 14z" />
            </svg>
        </div>
        <div class="flex items-center space-x-3">
            <span class="text-gray-600">Showing</span>
            <select class="border rounded-lg p-2">
                <option>9</option>
                <option>15</option>
                <option>30</option>
            </select>
            <button class="flex items-center px-4 py-2 bg-gray-200 rounded-lg shadow-sm">
                <svg class="w-5 h-5 mr-1 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
                Filter
            </button>
            <button class="px-4 py-2 bg-red-400 text-white rounded-lg shadow-sm hover:bg-red-500">
                Add New Product
            </button>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-gray-600">Product Name</th>
                    <th class="px-6 py-3 text-gray-600">Product ID</th>
                    <th class="px-6 py-3 text-gray-600">Price</th>
                    <th class="px-6 py-3 text-gray-600">Stock</th>
                    <th class="px-6 py-3 text-gray-600">Status</th>
                    <th class="px-6 py-3 text-gray-600">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="border-b last:border-b-0 hover:bg-gray-100">
                    <td class="px-6 py-4">{{ $product->name }}</td>
                    <td class="px-6 py-4">#{{ $product->id }}</td>
                    <td class="px-6 py-4">IDR {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">{{ $product->stock }} pcs</td>
                    <td class="px-6 py-4 font-semibold {{ $product->stock > 0 ? 'text-green-600' : 'text-red-500' }}">
                        {{ $product->stock > 0 ? 'Available' : 'Out of Stock' }}
                    </td>
                    <td class="px-6 py-4">...</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4 flex justify-center space-x-2">
        <button class="px-4 py-2 bg-gray-200 rounded-lg">Previous</button>
        <button class="px-4 py-2 bg-red-400 text-white rounded-lg">01</button>
        <button class="px-4 py-2 bg-gray-200 rounded-lg">02</button>
        <button class="px-4 py-2 bg-gray-200 rounded-lg">03</button>
        <span class="px-4 py-2">...</span>
        <button class="px-4 py-2 bg-gray-200 rounded-lg">15</button>
        <button class="px-4 py-2 bg-gray-200 rounded-lg">Next</button>
    </div>
</div>
@endsection