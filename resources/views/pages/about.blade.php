@extends('layouts.main')

@section('content')

    <h1 class="font-bold text-gray-700 block text-center text-3xl mt-6 mb-10">About Us</h1>
    <p class=" mb-1 text-gray-700 block text-xl mt-6 mb-6 mx-10">This page explains all of the functionalities in this
        website per page.</p>

    <div class="flex flex-wrap mx-10 justify-around">

        <h1 class="font-bold text-gray-700 block w-full text-left text-xl mt-6 mb-6">General Info</h1>
        <ul class="w-full list-inside list-disc">
            <li><label class="underline">Made By:</label> Seppe Clottemans.</li>
            <li><label class="underline">Created with:</label> Laravel and tailwind.</li>
        </ul>

        <h1 class="font-bold text-gray-700 block w-full text-left text-xl mt-6 mb-6">Register</h1>
        <ul class="w-full list-inside list-disc">
            <li><label class="underline">Create an account:</label> Enter your data and press the register button.</li>
            <li><label class="underline">Select your preferences:</label> Not every user will be interested in all categories. That is why you can select your preferred categories on registration by selecting the categories in the dropdown below "category presences".
                You will automatically see items that belong to these categories on the home page. You can also still change these later on the Profile page.</li>
        </ul>

        <h1 class="font-bold text-gray-700 block w-full text-left text-xl mt-6 mb-6">Login</h1>
        <ul class="w-full list-inside list-disc">
            <li><label class="underline">Login:</label> Enter your credentials and press the login button.</li>
            <li><label class="underline">Remember Me:</label> You can check the remember me checkbox to generate a remember token so you don't have to login every time.</li>
        </ul>

        <h1 class="font-bold text-gray-700 block w-full text-left text-xl mt-6 mb-6">Navigation</h1>
        <ul class="w-full list-inside list-disc">
            <li><label class="underline">Home:</label> Go to the home page by clicking the Loan system name on the top left.</li>
            <li><label class="underline">Notifications:</label> View your rent requests by clicking the notifications tab (bell icon on the top right).</li>
            <li><label class="underline">navigation pages:</label> Navigate through pages by opening the dropdown on the top right with your name on it.</li>
        </ul>

        <h1 class="font-bold text-gray-700 block w-full text-left text-xl mt-6 mb-6">Home</h1>
        <ul class="w-full list-inside list-disc">
            <li><label class="underline">Filter:</label> The categories you are interested in will be automatically selected but you can still filter items by selecting new-or removing categories in the first dropdown. (on the top left)</li>
            <li><label class="underline">Sort:</label> Sort items by your presence by selecting from the second dropdown.</li>
            <li> Activate the above by pressing the filter button.</li>
            <p> NOTE: only items that are still available and fit your preferences will be shown.</p>
            <li><label class="underline">Item Info:</label> On each item card you will see an info button by clicking on it you will go to the item info page here you will see some info about the item including: title, description, number of available items, all images and the categories of the item.</li>
            <li><label class="underline">Rent:</label> 1. Rent an item by clicking on on the rent button of an item on the home- or item info page.</li>
            <p class="ml-16">2. Fill in the form of the rent request and press rent.</p>
            <p class="ml-16">3. A rent request will be sent to the item owner which he can accept or decline by clicking accept or decline in the notifications tab by the notifications icon in the navigation bar. (on the top right)</p>
        </ul>

        <h1 class="font-bold text-gray-700 block w-full text-left text-xl mt-6 mb-6">Add item</h1>
        <ul class="w-full list-inside list-disc">
            <li><label class="underline">Add an item:</label> Add an item to your profile by filling in the add item form and click add item. you can upload multiple images per item (max 4) and add the fitting categories to your item.</li>
        </ul>

        <h1 class="font-bold text-gray-700 block w-full text-left text-xl mt-6 mb-6">Inventory</h1>
        <ul class="w-full list-inside list-disc">
            <li><label class="underline">Inventory list:</label> View all of your items.</li>
            <li><label class="underline">Edit item:</label> Change the info delete and add new images change and change the categories.</li>
            <li><label class="underline">Delete item:</label> Delete an item and all it's belongings (images, categories, ongoing rents).</li>
        </ul>

        <h1 class="font-bold text-gray-700 block w-full text-left text-xl mt-6 mb-6">Ongoing rents</h1>
        <ul class="w-full list-inside list-disc">
            <li><label class="underline">View all your ongoing rents:</label> View all your ongoing rents and their info + email owner to contact when there is a problem.</li>
        </ul>

        <h1 class="font-bold text-gray-700 block w-full text-left text-xl mt-6 mb-6">Ongoing rentals</h1>
        <ul class="w-full list-inside list-disc">
            <li><label class="underline">View all your ongoing rentals:</label> View all your ongoing rentals and their info + email renter to contact when there is a problem.</li>
            <li><label class="underline">Returned:</label> Delete ongoing rent when the item has been returned.</li>
        </ul>

        <h1 class="font-bold text-gray-700 block w-full text-left text-xl mt-6 mb-6">Profile</h1>
        <ul class="w-full list-inside list-disc">
            <li><label class="underline">Change info:</label> Change your info like your item category preferences.</li>
            <li><label class="underline">Set profile picture:</label> Set your profile picture.</li>
        </ul>

        <h1 class="font-bold text-gray-700 block w-full text-left text-xl mt-6 mb-6">All users (admin only)</h1>
        <ul class="w-full list-inside list-disc">
            <li><label class="underline">view all users:</label></li>
            <li><label class="underline">Make admin:</label> Make a user an admin.</li>
            <li><label class="underline">Delete user:</label> Delete a user account.</li>
        </ul>


        <h1 class="font-bold text-gray-700 block w-full text-left text-xl mt-12 mb-6">Additional info:</h1>

        <h1 class="font-bold text-gray-700 block w-full text-left text-xl mt-6 mb-6">Security</h1>
        <ul class="w-full list-inside list-disc">
            <li><label class="underline">Gates:</label> Things like edit item view notifications,... are protected by gates if you are not authorised to these actions you will be redirected to an unauthorised page.</li>
            <li><label class="underline">Middleware:</label> The admin functions and functions that you need an account for are protected by middleware. (CheckAdmin, Authenticate) </li>
        </ul>

        <h1 class="font-bold text-gray-700 block w-full text-left text-xl mt-6 mb-6">Code logic</h1>
        <ul class="w-full list-inside list-disc">
            <li><label class="underline">Requests:</label> Form requests are validated in the custom request files.</li>
            <li><label class="underline">Services:</label> Database requests are made in the Services files.</li>
        </ul>


    </div>

@endsection


