<x-app-layout>
    <div class="container pl-12 pb-12 mx-auto mt-20">
    <div class="flex items-center justify-center px-1 sm:px-0">
        
    <div class="px-4 sm:px-0">
        <img src="{{ asset('assets/images/form_image.png') }}" class=" w-80 h-80 img-fluid blur-up lazyload "
                                            alt="logo">   
        
        <h2 class=" mt-6 ml-12 Stext-base font-semibold leading-7 text-gray-900">
            Update Category
        </h2>
        <p class="mt-1 ml-12 text-sm leading-6 text-gray-600">
            Update the category details.
        </p>
    </div>

    <form action="{{ route('product-category.store') }}" method="post"
        class="container max-w-2xl mx-auto mt-1 p-8 bg-white shadow-md rounded-md md:grid-cols-3">
        @csrf

        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input id="name" type="text" name="name" :value="old('name')"
                class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-indigo-500">
                <p class="mt-3 text-sm leading-6 text-gray-600">
                    Name of the product category
                </p>
        </div>

        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <input id="slug" type="text" name="slug" :value="old('slug')"
                class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-indigo-500">
                <p class="mt-3 text-sm leading-6 text-gray-600">
                    Category Slug
                </p>    
        </div>

        <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit"
            class="px-4 py-2 text-sm font-semibold text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            Save
        </button>
            </div>
        
    </form>
    </div>
    </div>
</x-app-layout>