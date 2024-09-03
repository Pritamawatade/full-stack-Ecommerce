<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">



    <!-- Container -->
    <div class="flex items-center justify-center min-h-screen p-6 bg-gray-100">
        <img class="h-48 w-48 mr-3" src="../assets/payments.jpg" alt="">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-lg gap-2">

            <!-- Form Title -->
            <h2 class="text-2xl font-bold text-center text-gray-800">Upload Payment QR Code</h2>

            <!-- Image Upload Form -->
            <form action="process_checkout.php" method="POST" enctype="multipart/form-data" class="space-y-6">

                <!-- Image Preview -->
                <div class="flex justify-center">
                    <img id="preview" src="#" alt="Image Preview" class="hidden w-40 h-40 rounded shadow-md">
                </div>

                <!-- File Input -->
                <div class="flex items-center justify-center w-full">
                    <label for="image" class="flex flex-col items-center justify-center w-full p-4 bg-gray-100 border-2 border-dashed rounded-lg cursor-pointer border-gray-300 hover:bg-gray-50">
                        <svg class="w-10 h-10 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16.5V19a2 2 0 002 2h12a2 2 0 002-2v-2.5M16.5 9A3.5 3.5 0 0112 5.5 3.5 3.5 0 017.5 9v1a3.5 3.5 0 01-7 0V9a3.5 3.5 0 013.5-3.5 3.5 3.5 0 013.5 3.5v1a3.5 3.5 0 017 0V9a3.5 3.5 0 013.5-3.5A3.5 3.5 0 0122 9v1a3.5 3.5 0 01-7 0V9z"></path>
                        </svg>
                        <p class="pt-1 text-sm tracking-wider text-gray-500">Click to select an image</p>
                        <input id="image" name="image" type="file" class="hidden" accept="image/*" onchange="previewImage(event)" required>
                    </label>
                </div>
                <input type="hidden" name="address" value="<?php echo $_POST['address'] ?>">
                <!-- Submit Button -->
                <button type="submit" class="w-full px-4 py-2 font-bold text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                    Upload Image
                </button>

            </form>
        </div>
    </div>

    <!-- JavaScript for Image Preview -->
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview');
                output.src = reader.result;
                output.classList.remove('hidden');
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</body>

</html>