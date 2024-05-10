@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url('{{ asset("img/1_2KWziNOstK2Vsy6n77ylNg.jpg") }}');
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
        padding: 0;   
    }

    .card {
        background-color: rgba(255, 255, 255, 0.7); /* Transparent white background */
        border-radius: 1rem;
        box-shadow: 0 0 1rem rgba(0, 0, 0, 0.2); /* Shadow */
        height: 70%;
        width: 70%;
        margin: auto; /* Center horizontally */
        overflow: hidden; /* Hide overflow content */
    }
</style>
<div class="flex justify-center items-center h-screen">
        <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6 max-w-md w-full">
            <div class="card" style="background-image: url('{{ asset('img/1_2KWziNOstK2Vsy6n77ylNg.jpg') }}'); background-size: cover;">
                <div class="p-6">
                    <form action="{{ route('submit.form.and.redirect') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div class="flex flex-col">
                            <label for="video" class="font-semibold">
                                Video:
                            </label>
                            <input type="file" name="video" id="video" accept="video/*" class="border rounded p-2 focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="flex flex-col">
                            <label for="video" class="font-semibold">
                                Video:
                            </label>
                            <input type="file" name="video" id="video" accept="image/*" class="border rounded p-2 focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="flex flex-col">
                            <label for="title" class="font-semibold">
                                Title:
                            </label>
                            <input type="text" name="title" placeholder="Ex: F-22 Raptor" id="title" required class="border rounded p-2 focus:outline-none focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="genre" class="font-semibold">
                                Genre:
                            </label>
                            <input type="text" name="genre" placeholder="Ex: horror" id="genre" required class="border rounded p-2 focus:outline-none focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="year" class="font-semibold">
                                Year:
                            </label>
                            <input type="text" name="year" placeholder="Ex: 2012" id="year" required class="border rounded p-2 focus:outline-none focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="description" class="font-semibold">
                                Description:
                            </label>
                            <input type="text" name="description" placeholder="Ex: USA" id="description" required class="border rounded p-2 focus:outline-none focus:border-blue-500">
                        </div>
                        <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded hover:bg-green-600 focus:outline-none">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
