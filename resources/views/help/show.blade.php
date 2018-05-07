@extends('layouts.master')
@section('title')
Help
@endsection
@section('content')

<div class="container-fluid w-100 dashboard-page">
    <div class="row">
        <div class="col-4 col-md-3 bg-secondary text-center  p-0">
            <p class="my-1 small-i "><i class="material-icons custom-color custom-shadow dashboard-page">live_help</i></p>
            <ul class="list-group text-light dashboard-page pb-5 h-100" role="tablist" >
                <li class="my-2"><b-btn block href="#"  variant="info" v-b-toggle.user-account data-target="#user-account"><i class="material-icons mr-3">perm_contact_calendar</i>User Account  </b-btn></li>
                <li class="my-2"><b-btn block href="#"  variant="info" v-b-toggle.seller-account data-target="#seller-account"><i class="material-icons mr-3">account_balance</i>Seller Account  </b-btn></li>
                <li class="my-2"><b-btn block href="#"  variant="info" v-b-toggle.car-adverts data-target="#car-advert"><i class="material-icons mr-3">directions_car</i>Car    Adverts  </b-btn></li>
                <li class="my-2"><b-btn block href="#"  variant="info" v-b-toggle.search><i class="material-icons mr-3">find_in_page</i>Search  </b-btn></li>
                <li class="my-2"><b-btn block href="#"  variant="info" v-b-toggle.favorite-cars><i class="material-icons mr-3">star_border</i>Favorite  Cars  </b-btn></li>
                <li class="my-2"><b-btn block href="#"  variant="info" v-b-toggle.recent-cars><i class="material-icons mr-3">history</i>Recent    Cars  </b-btn></li>
                <li class="my-2"><b-btn block href="#"  variant="info" v-b-toggle.subscriptions><i class="material-icons mr-3">rss_feed</i>Subscriptions   </b-btn></li>
            </ul>
        </div>
        <div class="col-8 col-md-9 justify-content-center">
                <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>                           
                            <li class="breadcrumb-item active" aria-current="page">Help</li>
                        </ol>
                </nav>
            <h2 class=" text-center text-info" >Help</h2>
            
            <div class="w-100 mx-auto text-center text-secondary">
                <div  class="pt-0 mt-0">
                    <b-card no-body>
                        <b-collapse id="helps" visible accordion="help" role="tabpanel"  >
                            <b-card-body>
                                <div  class="custom-shadow help-container  p-2 p-md-3 p-lg-5 rounded">
                                    <h3>Carbe to Help</h3>
                                    <p>
                                        Carbe was designed to ensure you will have the best experience surfing our application with the outmost ease.<br> 
                                        However , if you are experiencing difficulties or you are unsure how to use Carbe, you have come in the right place.<br>
                                    </p>
                                    <p class="bg-custom rounded my-3 p-1 p-md-5 text-light">
                                        To begin with, please select one of the <strong>Tabs</strong> on the left hand side of the screen that is the most appropriate to your 
                                        help query. You will then be promted with help information on the most important and common topics.<br>
                                        If you will still need help after reading our help information please feel free to leave us a message :<br>
                                        <a class="btn btn-secondary w-50 my-3" href="{{ route('contact.create') }}" role="button">Contact Carbe</a>
    
                                    </p>
                                </div>
                            </b-card-body>
                        </b-collapse>
                    </b-card>                    
                    <b-card no-body>
                        <b-collapse id="user-account"  accordion="help" role="tabpanel">
                            <b-card-body>
                                <div  class="custom-shadow help-container  p-2 p-md-3 p-lg-5 rounded">
                                    <div role="tablist">
                                        <h3>User Account</h3>
                                        <b-card no-body class="mb-1">
                                        <b-card-header header-tag="header" class="p-1 bg-white border-bottom-0" role="tab">
                                            <ul class="share-icon my-3">
                                                <li class="w-30"><button type="button" class="btn btn-primary w-100" v-b-toggle.user-account-create>Create</button></li>
                                                <li class="w-30"><button type="button" class="btn btn-info w-100" v-b-toggle.user-account-view>View</button></li>
                                                <li class="w-30"><button type="button" class="btn btn-danger w-100" v-b-toggle.user-account-delete>Delete</button></li>
                                            </ul>
                                        </b-card-header>
                                        <b-collapse id="user-account-create" visible accordion="user-account" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>Create User Account</h4>
                                                <p>In order to register and create a User Account please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Navigate to the Registration page <a class="btn btn-secondary" href="{{ route('register') }}" role="button">Register Account</a></li>
                                                    <li>Complete the required fields
                                                        <ul class="list-unstyled ml-5">
                                                            <li>First Name</li>
                                                            <li>Surname</li>
                                                            <li>Email address</li>
                                                            <li>Password</li>
                                                            <li>Password Confirmation</li>
                                                        </ul>
                                                    </li>
                                                    <li>Press Register</li>
                                                </ol>
                                           
                                                <p>After a successfuly registration , you will be automaticaly logged in and you will be able to enjoy all of Carbe's features</p>
                                            </b-card-body>
                                        </b-collapse>
                                        <b-collapse id="user-account-view" accordion="user-account" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>View User Account</h4>
                                                <p>In order to <strong>View , Edit and Change Password</strong> on your User Account Profile please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Login to your account</li>
                                                    <li>Navigate to your User Profile page <a class="btn btn-secondary" href="{{ route('user.show') }}" role="button">User Profile</a></li>
                                                    <li>Take the required action</li>
                                                </ol>
                                           
                                                <p>You will be able to <strong>View , Edit and Change Password</strong> on your User Profile details there.</p>
                                            </b-card-body>
                                        </b-collapse>
                                        <b-collapse id="user-account-delete" visible accordion="user-account" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>Delete User Account</h4>
                                                <p>In order to delete your User Account please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Login to your account</li>
                                                    <li>Navigate to your User Profile page <a class="btn btn-secondary" href="{{ route('user.show') }}" role="button">User Profile</a></li>
                                                    <li>Press Delete </a></li>   
                                                </ol>
                                           
                                                <p>Your User Account will be permanently deleted but you will always be welcomed back and create a new account</p>
                                            </b-card-body>
                                        </b-collapse>                                                                                
                                        </b-card>


                                    </div>
                                </div>
                            </b-card-body>
                        </b-collapse>
                    </b-card>
                    <b-card no-body>
                        <b-collapse id="seller-account"  accordion="help" role="tabpanel">
                            <b-card-body>
                                <div  class="custom-shadow help-container  p-2 p-md-3 p-lg-5 rounded">
                                    <div role="tablist">
                                        <h3>Seller Account</h3>
                                        <b-card no-body class="mb-1">
                                        <b-card-header header-tag="header" class="p-1 bg-white border-bottom-0" role="tab">
                                            <ul class="share-icon my-3">
                                                <li class="w-30"><button type="button" class="btn btn-primary w-100" v-b-toggle.seller-account-create>Create</button></li>
                                                <li class="w-30"><button type="button" class="btn btn-info w-100" v-b-toggle.seller-account-view>View</button></li>
                                                <li class="w-30"><button type="button" class="btn btn-danger w-100" v-b-toggle.seller-account-delete>Delete</button></li>
                                            </ul>
                                        </b-card-header>
                                        <b-collapse id="seller-account-create" visible accordion="seller-account" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>Create Seller Account</h4>
                                                <p>In order to register and create a Seller Account please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Register/Login into your Carbe account</li>
                                                    <li>Navigate to the Seller Registration page <a class="btn btn-secondary" href="{{ route('seller.create') }}" role="button">Register Seller Account</a></li>
                                                    <li>Complete the required fields</li>                                                   
                                                    <li>Press Register</li>
                                                </ol>
                                           
                                                <p>After a successfuly seller registretion , you will be redirected to the Create Car Adverts page where you will be able to publish for sale car adverts</p>
                                            </b-card-body>
                                        </b-collapse>
                                        <b-collapse id="seller-account-view" accordion="seller-account" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>View Seller Account</h4>
                                                <p>In order to <strong>View and Edit</strong> your Seller Account Profile please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Login to your account</li>
                                                    <li>Navigate to your Seller Profile page <a class="btn btn-secondary" href="{{ route('seller.show') }}" role="button">Seller Profile</a></li>
                                                    <li>Take the required action</li>
                                                </ol>
                                           
                                                <p>You will be able to <strong>View and Edit</strong>  your Seller Profile details there.</p>
                                            </b-card-body>
                                        </b-collapse>
                                        <b-collapse id="seller-account-delete" visible accordion="seller-account" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>Delete Seller Account</h4>
                                                <p>In order to delete your Seller Account please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Login to your account</li>
                                                    <li>Navigate to your Seller Profile page <a class="btn btn-secondary" href="{{ route('seller.show') }}" role="button">Seller Profile</a></li>
                                                    <li>Press Delete </a></li>   
                                                </ol>
                                           
                                                <p>Your Seller Account and all your published Car Adverts will be permanently deleted, but you will always be welcomed back and create a new seller account and publish for sale car adverts.</p>
                                            </b-card-body>
                                        </b-collapse>                                                                                
                                        </b-card>


                                    </div>
                                </div>
                            </b-card-body>
                        </b-collapse>
                    </b-card>   
                    <b-card no-body>
                        <b-collapse id="car-adverts"  accordion="help" role="tabpanel">
                            <b-card-body>
                                <div  class="custom-shadow help-container  p-2 p-md-3 p-lg-5 rounded">
                                    <div role="tablist">
                                        <h3> Car Adverts</h3>
                                        <b-card no-body class="mb-1">
                                        <b-card-header header-tag="header" class="p-1 bg-white border-bottom-0" role="tab">
                                            <ul class="share-icon my-3">
                                                <li class="w-30"><button type="button" class="btn btn-primary w-100" v-b-toggle.adverts-create>Create</button></li>
                                                <li class="w-30"><button type="button" class="btn btn-info w-100" v-b-toggle.adverts-view>View</button></li>
                                                <li class="w-30"><button type="button" class="btn btn-danger w-100" v-b-toggle.adverts-delete>Delete</button></li>
                                            </ul>
                                        </b-card-header>
                                        <b-collapse id="adverts-create" visible accordion="adverts" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>Create Car Advert</h4>
                                                <p>In order to create a for <strong>Sale Car Advert</strong> please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Register/Login into your Carbe account</li>
                                                    <li>Register Seller Account<a class="btn btn-secondary" href="{{ route('seller.create') }}" role="button">Register Seller Account</a></li>
                                                    <li>Navigate to Create Car Adverts page <a class="btn btn-secondary" href="{{ route('advert.create') }}" role="button">Create Advert</a></li>
                                                    <li>Enter Registration Plate </li>                                                   
                                                    <li>Confirm vehicle details</li>
                                                    <li>Complete the required fields</li>
                                                    <li>Press Pubish</li>
                                                </ol>
                                           
                                                <p>After a successfuly car advert publishing , your advert will be able to be viewd on carbe</p>
                                            </b-card-body>
                                        </b-collapse>
                                        <b-collapse id="adverts-view" accordion="adverts" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>View Car Adverts</h4>
                                                <p>In order to <strong>View, Edit and Delete</strong> car adverts please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Login to your account</li>
                                                    <li>Navigate to your Adverts page <a class="btn btn-secondary" href="{{ route('advert.index') }}" role="button">Car Adverts</a></li>
                                                    <li>Take the required action</li>
                                                </ol>
                                           
                                                <p>You will be able to <strong>View, Edit and Delete</strong>  any of your for sale car adverts there.</p>
                                            </b-card-body>
                                        </b-collapse>
                                        <b-collapse id="adverts-delete" visible accordion="adverts" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>Delete Car Advert</h4>
                                                <p>In order to delete a Car Advert please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Login to your account</li>
                                                    <li>Navigate to your Seller Profile page <a class="btn btn-secondary" href="{{ route('advert.index') }}" role="button">Car Adverts</a></li>
                                                    <li>Press Delete on required advert</a></li>   
                                                </ol>
                                           
                                                <p>Your for sale Car Advert will be permanently deleted, but you can always create a new for sale car adverts.</p>
                                            </b-card-body>
                                        </b-collapse>                                                                                
                                        </b-card>


                                    </div>
                                </div>
                            </b-card-body>
                        </b-collapse>
                    </b-card>                                
                    <b-card no-body>
                        <b-collapse id="search"  accordion="help" role="tabpanel">
                            <b-card-body>
                                <div  class="custom-shadow help-container  p-2 p-md-3 p-lg-5 rounded">
                                    <div role="tablist">
                                        <h3>Search</h3>
                                        <b-card no-body class="mb-1">
                                        <b-card-header header-tag="header" class="p-1 bg-white border-bottom-0" role="tab">
                                            <ul class="share-icon my-3">
                                                <li class="w-30"><button type="button" class="btn btn-primary w-100" v-b-toggle.search-create>Search</button></li>
                                                <li class="w-30"><button type="button" class="btn btn-info w-100" v-b-toggle.search-view>Save</button></li>
                                                <li class="w-30"><button type="button" class="btn btn-success w-100" v-b-toggle.search-delete>View</button></li>
                                            </ul>
                                        </b-card-header>
                                        <b-collapse id="search-create" visible accordion="search" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>Search Car Adverts</h4>
                                                <p>In order to Search for car adverts please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Navigate to the Search page <a class="btn btn-secondary" href="{{ route('search.create') }}" role="button">Search</a></li>
                                                    <li>Select prefered fields</li>                                                   
                                                    <li>Press Search</li>
                                                </ol>
                                           
                                                <p>After you will be shown the results with all the car adverts matching your search criteria</p>
                                            </b-card-body>
                                        </b-collapse>
                                        <b-collapse id="search-view" accordion="search" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>Save Search</h4>
                                                <p>In order to <strong>Save</strong> a search please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Register/Login to your account</li>
                                                    <li>Navigate to the Search page <a class="btn btn-secondary" href="{{ route('search.create') }}" role="button">Search</a></li>
                                                    <li>Press Save Search</li>
                                                </ol>
                                           
                                                <p>Your Search will be saved and you will be able to use it at any time. There is a limit of 25 saved searches.</p>
                                            </b-card-body>
                                        </b-collapse>
                                        <b-collapse id="search-delete" visible accordion="search" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>View Searches</h4>
                                                <p>In order to  view your <strong>Searches</strong>  please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Login to your account</li>
                                                    <li>Navigate to your Searches page <a class="btn btn-secondary" href="{{ route('search.index') }}" role="button">Searches</a></li>
                                                    <li>Select desired action </li>   
                                                </ol>
                                           
                                                <p>You will be able to view , acces and delete Searches on this page.</p>
                                            </b-card-body>
                                        </b-collapse>                                                                                
                                        </b-card>


                                    </div>
                                </div>
                            </b-card-body>
                        </b-collapse>
                    </b-card>                                
                    <b-card no-body>
                        <b-collapse id="favorite-cars"  accordion="help" role="tabpanel">
                            <b-card-body>
                                <div  class="custom-shadow help-container  p-2 p-md-3 p-lg-5 rounded">
                                    <div role="tablist">
                                        <h3>Favorite Car Adverts</h3>
                                        <b-card no-body class="mb-1">
                                        <b-card-header header-tag="header" class="p-1 bg-white border-bottom-0" role="tab">
                                            <ul class="share-icon my-3">
                                                <li class="w-30"><button type="button" class="btn btn-primary w-100" v-b-toggle.favorite-cars-create>Save</button></li>
                                                <li class="w-30"><button type="button" class="btn btn-info w-100" v-b-toggle.favorite-cars-view>View</button></li>
                                                <li class="w-30"><button type="button" class="btn btn-danger w-100" v-b-toggle.favorite-cars-delete>Delete</button></li>
                                            </ul>
                                        </b-card-header>
                                        <b-collapse id="favorite-cars-create" visible accordion="favorite-cars" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>Save Favorite Car Advert</h4>
                                                <p>In order to save a Favorite Car Advert please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Register/Login into your Carbe account</li>
                                                    <li>Navigate to the Search results or Car Advert page</li>
                                                    <li>Press Favorite+ </li>                                                   
                                                </ol>
                                           
                                                <p>Your Favorite car advert will de saved and you will be able to access it at any time.<br>
                                                    There is a limit of 25 saved Favorites, if you reach this limit you will  have to delete favorites in order to save others.
                                                </p>
                                            </b-card-body>
                                        </b-collapse>
                                        <b-collapse id="favorite-cars-view" accordion="favorite-cars" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>View Favorites Car Adverts</h4>
                                                <p>In order to <strong>View</strong> your Favorite Car Adverts please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Login to your account</li>
                                                    <li>Navigate to your Favorites page <a class="btn btn-secondary" href="{{ route('favorite.index') }}" role="button">Favorites</a></li>
                                                    <li>Take the required action</li>
                                                </ol>
                                           
                                                <p>You will be able to <strong>View and Edit</strong>  your Seller Profile details there.</p>
                                            </b-card-body>
                                        </b-collapse>
                                        <b-collapse id="favorite-cars-delete" visible accordion="favorite-cars" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>Delete Favorite Car Advert</h4>
                                                <p>In order to delete a Favorite Car Advert please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Login to your account</li>
                                                    <li>Navigate to your Favorites page <a class="btn btn-secondary" href="{{ route('favorite.index') }}" role="button">Favorites</a></li>
                                                    <li>Press Delete </a></li>   
                                                </ol>
                                           
                                                <p>Your Favorite Car Advert will be permanently deleted but you can allway add new favorites at any time.</p>
                                            </b-card-body>
                                        </b-collapse>                                                                                
                                        </b-card>


                                    </div>
                                </div>
                            </b-card-body>
                        </b-collapse>
                    </b-card>            
                    <b-card no-body>
                        <b-collapse id="recent-cars"  accordion="help" role="tabpanel">
                            <b-card-body>
                                <div  class="custom-shadow help-container  p-2 p-md-3 p-lg-5 rounded">
                                    <h3>Recent Cars</h3>
                                    <p>
                                        Recent viewed car adverts are automaticly saved when you are logged in and you view a car advert. 

                                    </p>
                                    <div class="bg-custom rounded my-3 p-1 p-md-5 text-light">
                                        <p> In order to view your Recent Cars please take the fallowing steps : </p>
                                                <ol class="text-left ">
                                                    <li>Login to your account</li>
                                                    <li>Navigate to your Recent Cars page <a class="btn btn-secondary" href="{{ route('recent.index') }}" role="button">Recent Cars</a></li>
                                                    <li>Select  desired action</a></li>   
                                                </ol>
                                        <p>On the Recent Cars page you will be view, access and delete recent car adverts. Only the last 5 viewed car adverts will de saved.</p>
                                    </div>
                                </div>
                            </b-card-body>
                        </b-collapse>
                    </b-card>            
                    <b-card no-body>
                        <b-collapse id="subscriptions"  accordion="help" role="tabpanel">
                            <b-card-body>
                                <div  class="custom-shadow help-container  p-2 p-md-3 p-lg-5 rounded">
                                    <div role="tablist">
                                        <h3>Subscriptions</h3>
                                        <b-card no-body class="mb-1">
                                        <b-card-header header-tag="header" class="p-1 bg-white border-bottom-0" role="tab">
                                            <ul class="share-icon my-3">
                                                <li class="w-30"><button type="button" class="btn btn-primary w-100" v-b-toggle.subscriptions-create>Save</button></li>
                                                <li class="w-30"><button type="button" class="btn btn-info w-100" v-b-toggle.subscriptions-view>View</button></li>
                                                <li class="w-30"><button type="button" class="btn btn-danger w-100" v-b-toggle.subscriptions-delete>Delete</button></li>
                                            </ul>
                                        </b-card-header>
                                        <b-collapse id="subscriptions-create" visible accordion="subscriptions" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>Save Subscription</h4>
                                                <p>In order to save a Subscription please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Register/Login into your Carbe account</li>
                                                    <li>Navigate to the Search page <a class="btn btn-secondary" href="{{ route('search.create') }}" role="button">Search</a></li>
                                                    <li>Select the prefered options</li>                                                   
                                                    <li>Press Subscribe</li>
                                                </ol>
                                           
                                                <p>After a successfuly subscription , you will receive email notifications when a new for sale car advert that matches your criteria is published.</p>
                                            </b-card-body>
                                        </b-collapse>
                                        <b-collapse id="subscriptions-view" accordion="subscriptions" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>View Subscriptions</h4>
                                                <p>In order to <strong>View</strong> your Subscriptions please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Login to your account</li>
                                                    <li>Navigate to your Subscriptions page <a class="btn btn-secondary" href="{{ route('subscription.index') }}" role="button">Subscriptions</a></li>
                                                    <li>Take the required action</li>
                                                </ol>
                                           
                                                <p>You will be able to <strong>View and Delete</strong>  your Subscriptions there. There is a limit of 5 subscriptions.</p>
                                            </b-card-body>
                                        </b-collapse>
                                        <b-collapse id="subscriptions-delete" visible accordion="subscriptions" role="tabpanel">
                                            <b-card-body class="bg-custom text-light rounded">
                                                <h4>Delete Subscription</h4>
                                                <p>In order to delete a Subscription please take the fallowing steps :</p>
                                                
                                                <ol class="text-left">
                                                    <li>Login to your account</li>
                                                    <li>Navigate to your Subscriptions page <a class="btn btn-secondary" href="{{ route('subscription.index') }}" role="button">Subscriptions</a></li>
                                                    <li>Press Delete </a></li>   
                                                </ol>
                                           
                                                <p>Your Subscription will be permanently deleted and you will no longer receive notifications fro that particular subscription. You will always be welcomed back and create a new seller account and publish for sale car subscriptions.</p>
                                            </b-card-body>
                                        </b-collapse>                                                                                
                                        </b-card>


                                    </div>
                                </div>
                            </b-card-body>
                        </b-collapse>
                    </b-card>            


                </div>


            </div>
        </div>
    </div>
</div>     



@endsection