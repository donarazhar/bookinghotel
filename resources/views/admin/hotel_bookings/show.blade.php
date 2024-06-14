<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Details Booking') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src=" " alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">
                                asdasdsad
                            </h3>
                        <p class="text-slate-500 text-sm">
                            asdasd, asdsadsa
                        </p>
                        </div>
                    </div> 
                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Price</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            Rp 1/night
                        </h3>
                    </div> 
                    <form action=" " method="POST"> 
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Approve
                        </button>
                    </form> 
                </div>

                <hr class="my-5">

                <div class="grid grid-cols-2 gap-5">
                    <div class="flex flex-col gap-y-4">
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Status</p>

                                <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                                    SUCCESS
                                </span>

                                <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white">
                                    PENDING
                                </span> 

                        </div>

                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Name</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                asdasd
                            </h3>
                        </div>
        
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Email</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {asdasdd
                            </h3>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-4">
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Quantity</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                12 people
                            </h3>
                        </div>
        
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Total Days</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                1
                            </h3>
                        </div>
        
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Date</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                asdsadasd
                            </h3>
                        </div>

                    </div>
                </div>

                <hr class="my-5">

                <div class="grid grid-cols-2 gap-5">
                    <div class="flex flex-col gap-y-4">

                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Total Amount</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                Rp 1
                            </h3>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-4">
                        <h3 class="text-indigo-950 text-xl font-bold">
                            Bukti Pembayaran
                        </h3>
        
                        <img src=" " alt="" class="rounded-2xl object-cover w-[300px] h-[200px]">
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
