<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/esm/popper.min.js"></script>

<nav>
    <div id="logo">
        <span>Joblink</span>
    </div>
    <div class="position-relative">
        <!-- User avatar button -->
        <button id="dropdownUserAvatarButton" class="flex mx-3 text-sm rounded-full md:mr-0 focus:ring-4 profile">
            <img src="file/icons8-company-80.png" alt="">
            <span><?php echo $_SESSION['Email'] ?></span>
        </button>
        <!-- Dropdown menu for the user avatar -->
        <div id="dropdownAvatar" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <!-- User information section -->
            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                <p class="text-center"><?php echo $_SESSION['CompanyName'] ?></p>
                <div class="font-medium truncate"><?php echo $_SESSION['Email'] ?></div>
            </div>
            <!-- Links in the dropdown menu -->
            <a href="../index.php">Page Home</a>

            <div class="py-2">
                <a href="includes/Logout.php" class="logout px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                    <span>Se déconnecter </span>
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    document.querySelector("#dropdownUserAvatarButton").addEventListener('click',()=>{
        document.querySelector('#dropdownAvatar').classList.toggle('hidden');
    })
    document.querySelector("#dropdownUserAvatarButton").addEventListener('blur',()=>{
        setTimeout(()=>{
            document.querySelector('#dropdownAvatar').classList.add('hidden');
        },100)
    })
</script>