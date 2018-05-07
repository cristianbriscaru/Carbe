<footer class="text-center mt-5">
    <nav class="pt-3">
        <ul class="footers list-inline">
                <li class="list-inline-item footers"> <a href="{{route('advert.index')}}"  class=" footers">Adverts </a></li>
                <li class="list-inline-item footers"> <a href="{{route('favorite.index')}}"  class=" footers">Favorites  </a></li>
                <li class="list-inline-item footers"> <a href="{{route('recent.index')}}"  class=" footers">Recents </a></li>
                <li class="list-inline-item footers"> <a href="{{route('search.index')}}"  class=" footers">Searches </a></li>
                <li class="list-inline-item footers"> <a href="{{route('subscription.index')}}"  class=" footers">Subscriptions </a></li>
                <li class="list-inline-item footers"> <a href="{{route('help')}}"  class=" footers ">Help </a></li>
                <li class="list-inline-item footers"> <a href="{{route('about')}}"  class=" footers ">About Us </a></li>   
                <li class="list-inline-item footers"> <a href="{{route('contact.create')}}"  class=" footers ">Contact Us </a></li>          
        </ul>
    </nav>

    <ul class="list-inline my-5">
        <li class="list-inline-item mx-4" >
            <a v-b-tooltip.hover title="Facebook" href="https://www.facebook.com/carbe.co.uk/">
            <img src="{{asset ('media/app/if_facebook_circle_gray_107140.png') }}" alt="Facebook" height="36" width="36">
            </a>
        </li> 
        <li class="list-inline-item mx-5">
            <a v-b-tooltip.hover title="Instagram" href="https://www.instagram.com/carbe_social/">
            <img src="{{asset ('media/app/if_instagram_circle_gray_107138.png') }}" alt="Instagram" height="36" width="36">
            </a>
        </li> 
        <li class="list-inline-item mx-4" >
            <a v-b-tooltip.hover title="Twitter" href="https://twitter.com/Carbe_social">
            <img src="{{asset ('media/app/if_twitter_circle_gray_107135.png') }}" alt="Twitter" height="36" width="36">
            </a>
        </li> 
        <li class="list-inline-item mx-4" >
            <a v-b-tooltip.hover title="Youtube" href="https://www.youtube.com/">
            <img src="{{asset ('media/app/if_youtube_circle_gray_107133.png') }}" alt="Youtube" height="36" width="36">
            </a>
        </li> 
    </ul> 
    <p>Developed by Cristian & Andreea @Briscaru </p>
</footer>