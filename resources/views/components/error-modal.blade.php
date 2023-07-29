@props(['errors'])

@if ($errors->any())
    <div class="modal fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50">
        <div class="max-w-sm w-full p-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-6">Failed!</h2>
            <ul class="text-red-500">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <div class="flex items-center justify-end mt-4">
                <button type="button" onclick="closeModal()" class="px-4 py-2 text-sm bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50">
                    Close
                </button>
            </div>
        </div>
    </div>
@endif