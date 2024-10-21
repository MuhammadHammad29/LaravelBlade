<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @php($route = route('course.store'))
                    <form method="post" action="{{$route}}">
                        @csrf
                        <div class="mb-3 mt-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="title" placeholder="Enter title" name="title"
                                   value="@isset($data->title) {{$data->title}} @endisset">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="credit_hrs" class="form-label">Credit Hours:</label>
                            <input type="number" class="form-control @error('credit_hrs') is-invalid @enderror"
                                   id="credit_hrs" placeholder="Enter Credit Hours" name="credit_hrs"
                                   value="@isset($data->credit_hrs) {{$data->credit_hrs}} @endisset">
                            @error('credit_hrs')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <input type="hidden" name="id" value="@isset($data->id) {{$data->id}} @endisset">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
