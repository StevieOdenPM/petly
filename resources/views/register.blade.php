<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="min-h-screen flex justify-center items-center bg-gray-100">
        <div class="w-4/4 bg-white rounded-2xl shadow-xl flex overflow-hidden">
            <!-- Left: Register Form -->
            <div class="w-3/5 p-6 flex flex-col justify-center ml-12 mr-12">
                <div class="mb-4">
                    <img src="{{ URL('img/logopet.png') }}" alt="Logo" class="h-12">
                </div>
                <h2 class="text-xl font-bold text-gray-800 mb-2">Create An Account</h2>
                <p class="text-gray-600 mb-4">Welcome back! Select method to log in:</p>
                
                <div class="flex gap-3 mb-3">
                    <button class="w-1/2 flex items-center justify-center py-2 border rounded-lg bg-gray-100">
                        <i class="fab fa-google mr-2"></i> Google
                    </button>
                    <button class="w-1/2 flex items-center justify-center py-2 border rounded-lg bg-gray-100">
                        <i class="fab fa-facebook mr-2"></i> Facebook
                    </button>
                </div>
                
                <div class="relative my-3 text-center">
                    <span class="bg-white px-2 text-gray-600">or continue with email</span>
                </div>
                
                <input type="text" placeholder="Full Name" class="w-full px-4 py-2 mb-2 rounded-lg border border-gray-300">
                <input type="email" placeholder="Email" class="w-full px-4 py-2 mb-2 rounded-lg border border-gray-300">
                <input type="text" placeholder="Phone Number" class="w-full px-4 py-2 mb-2 rounded-lg border border-gray-300">
                <input type="password" placeholder="Password" class="w-full px-4 py-2 mb-2 rounded-lg border border-gray-300">
                <input type="password" placeholder="Confirm Password" class="w-full px-4 py-2 mb-2 rounded-lg border border-gray-300">
                
                <div class="flex items-center text-xs text-gray-600 mb-3">
                    <input type="checkbox" class="mr-2"> 
                    <span>I agree to the <a href="#" class="text-[#FF9494] font-semibold">Terms and Conditions</a> and the <a href="#" class="text-[#FF9494] font-semibold">Privacy Policy</a>.</span>
                </div>
                
                <button class="w-full bg-[#FF9494] text-white py-2 rounded-lg font-semibold">Sign Up</button>
                
                <p class="text-center text-gray-600 mt-3">
                    Already have an account? 
                    <a href="/login" class="text-[#FF9494]">Sign in</a>
                </p>
            </div>
            
            <!-- Right: Smaller Container but Larger Image -->
            <div class="w-2/3 flex justify-center items-center p-1">
                <img class="rounded-xl object-cover w-4/4" src="{{ URL('img/registercat1.png') }}" alt="image description">
            </div>
        </div>
    </div>
</body>
</html>
