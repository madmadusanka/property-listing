<x-guest-layout>
    <div class="relative z-10 pt-48 pb-52 bg-cover bg-center" style="background-image: url(/img/6.jpg)">
        <div class="absolute h-full w-full bg-black opacity-70 top-0 left-0 z-10"></div>
        <div class="container relative z-20 text-white text-center text-2xl">
            <h2 class="font-bold text-5xl mb-8 langBN">{{__('Discover Your Ideal Property Here!')}}</h2>
            <p class="text-2xl mt-8 langBN">{{ __('Explore Property Categories: Find Your Perfect Match, start searching now!') }}</p>
        </div>
    </div>

    <!-- Search From Area -->
    <div class="-mt-10">
        <div class="container">
            <div class="rounded-lg bg-white p-4 relative z-20 shadow-lg home-search">
                @include('components.property-search-form', ['locations' => $locations])
            </div>
        </div>
    </div>

    <div class="py-20 text-center">
        <div class="container">
            <h2 class="section-heading">Unlock the Potential of Your Property! Find the Perfect Tenants with Our Help. Post Your Listing Here and Reach Your Ideal Renters!</h2>
            <p class="text-gray-500 text-2xl font-bold mb-10">Maximize Your Reach: Get Your Ad in Front of a Diverse Audience</p>

            <a class="border-2 border-gray-700 rounded-2xl text-xl px-8 py-3 inline-block" href="">Post Your Add</a>

            <h2 class="section-heading pt-14">Our Commitment To You</h2>

            <div class="w-4/5 mx-auto">
                <div class="flex -mx-3 flex-wrap justify-between mt-10">
                    <div class="w-3/12  mt-10 mx-3">
                        <h3 class="mb-2 text-xl">Extensive Property Variety</h3>
                        <p class="text-xs text-center mx-auto w-4/6"> Explore a Diverse Range of Properties, Tailored to Your Preferences and Needs.
                        </p>
                    </div>
                    <div class="w-3/12  mt-10 mx-3">
                        <h3 class="mb-2 text-xl">Seamless Tenant Matching</h3>
                        <p class="text-xs text-center mx-auto w-4/6"> Let Us Assist You in Finding the Perfect Renters for Your Property, Ensuring a Smooth and Successful Rental Process.</p>
                    </div>
                    <div class="w-3/12  mt-10 mx-3">
                        <h3 class="mb-2 text-xl">Migrant-Friendly Support</h3>
                        <p class="text-xs text-center mx-auto w-4/6">Whether You're Relocating or Looking to Settle Down, We Provide Dedicated Assistance to Make Your Transition Effortless</p>
                    </div>
                    <div class="w-3/12  mt-10 mx-3">
                        <h3 class="mb-2 text-xl">Round-the-Clock Support</h3>
                        <p class="text-xs text-center mx-auto w-4/6">Our Expert Team is Available 24/7 to Address Your Inquiries and Provide Timely Solutions.</p>
                    </div>
                    <div class="w-3/12  mt-10 mx-3">
                        <h3 class="mb-2 text-xl">Extending Your Reach</h3>
                        <p class="text-xs text-center mx-auto w-4/6">We Employ Highly Effective Strategies to Amplify the Visibility of Your Property Listing, Attracting a Wide Audience of Potential Renters.

Transparent Transactions: Trust and Integrity Are at the Core of Our Operations. Expect Fair and Transparent Transactions at Every Step.</p>
                    </div>
                    <div class="w-3/12  mt-10 mx-3">
                        <h3 class="mb-2 text-xl">Transparent Transactions</h3>
                        <p class="text-xs text-center mx-auto w-4/6">Trust and Integrity Are at the Core of Our Operations. Expect Fair and Transparent Transactions at Every Step.</p>
                    </div>


                    <div class="w-3/12  mt-10 mx-3">
                        <h3 class="mb-2 text-xl">Streamlined Process</h3>
                        <p class="text-xs text-center mx-auto w-4/6">Experience a Hassle-Free Rental Journey with Our User-Friendly Platform and Time-Efficient Processes.</p>
                    </div>

                    <div class="w-3/12  mt-10 mx-3">
                        <h3 class="mb-2 text-xl">Verified Listings</h3>
                        <p class="text-xs text-center mx-auto w-4/6">Rest Assured, Every Property Listing on Our Website is Thoroughly Verified and Authenticated for Your Peace of Mind.</p>
                    </div>
                    <div class="w-3/12  mt-10 mx-3">
                        <h3 class="mb-2 text-xl">Local Expertise</h3>
                        <p class="text-xs text-center mx-auto w-4/6">Benefit from Our In-Depth Knowledge of the Local Rental Market, Ensuring You Make Informed Decisions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container text-center pt-14">
        <h2 class="section-heading">{{ __('More information about us') }}</h2>
        <div class="container pt-14">
        <div class="flex justify-between ">
            <div class="flex-1 mr-10 text-lg leading-normal">
                <p>At Sams Property Management, we are dedicated to making your property renting journey seamless and 
                    successful. Whether you are searching for the perfect rental property or looking to rent out your
                     valuable asset, we've got you covered. Our platform is designed to provide comprehensive support
                      for all your property-related needs.At [Website Name], we are dedicated to making your property
                       renting journey seamless and successful. Whether you are searching for the perfect rental property 
                       or looking to rent out your valuable asset, we've got you covered. 
                    Our platform is designed to provide comprehensive support for all your property-related needs.</p>
            </div>
        </div>
    </div>
        <!-- <div class="relative mt-10 mb-14 bg-cover rounded-xl py-24 bg-center"
             style="background-image: url(/img/6.jpg)">
            <div class="absolute w-full h-full rounded-xl opacity-50 bg-black left-0 top-0"></div>
            <div class="relative z-20">
                <a href="" class="text-white text-xl flex flex-col justify-center items-center"><span class="border-2 border-white w-12 h-12 text-center pt-1 pl-1 leading-10 text-2xl hover:border-yellow-500 duration-200 rounded-full mb-2"><i class="fa fa-play"></i></span>{{ __('Watch the video') }}</a>
            </div>
        </div> -->
<!-- 
        <div class="text-xl">
            <p>At Sams Property Management, we are dedicated to making your property renting journey seamless and successful. Whether you are searching for the perfect rental property or looking to rent out your valuable asset, we've got you covered. Our platform is designed to provide comprehensive support for all your property-related needs.At [Website Name], we are dedicated to making your property renting journey seamless and successful. Whether you are searching for the perfect rental property or looking to rent out your valuable asset, we've got you covered. Our platform is designed to provide comprehensive support for all your property-related needs.</p>

        </div> -->
    </div>


    <!-- <div class="container pt-14">
        <div class="flex justify-between ">
            <div class="flex-1 mr-10 text-lg leading-normal">
                <p>At Sams Property Management, we are dedicated to making your property renting journey seamless and 
                    successful. Whether you are searching for the perfect rental property or looking to rent out your
                     valuable asset, we've got you covered. Our platform is designed to provide comprehensive support
                      for all your property-related needs.At [Website Name], we are dedicated to making your property
                       renting journey seamless and successful. Whether you are searching for the perfect rental property 
                       or looking to rent out your valuable asset, we've got you covered. 
                    Our platform is designed to provide comprehensive support for all your property-related needs.</p>
            </div>
        </div>
    </div> -->
    <div class="container pt-14">
        <div class="flex justify-center items-center">
            <a href="{{route('page', 'about-us')}}" class="btn">More About US</a>
            <p class="mx-10">or</p>
            <a href="{{route('home')}}" class="btn">Start searching with filters</a>
            <p class="mx-10">or</p>
            <a href="{{route('login')}}" class="btn">Post Your Property</a>
            
        </div>
    </div>

    <!-- Last Added Objects -->
    <div class="container py-14">
        <h2 class="section-heading">{{ __('Last added properties') }}</h2>
        <div class="flex flex-wrap -mx-2 mt-10">

            @foreach($latest_properties as $property)
                @include('components.single-property-card', ['property' => $property, 'width' => 'w-1/4'])
            @endforeach


        </div>
    </div>

</x-guest-layout>
