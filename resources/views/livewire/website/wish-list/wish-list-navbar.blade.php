<div>
    <a href="{{ route('website.wish-list') }}" class="cart-item" style="position: relative; display: inline-block;">
    <span>
        <svg width="35" height="27" viewBox="0 0 35 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.4047 8.54989C11.6187 8.30247 11.8069 8.07783 12.0027 7.86001C15.0697 4.45162 20.3879 5.51717 22.1581 9.60443C23.4189 12.5161 22.8485 15.213 20.9965 17.6962C19.6524 19.498 17.95 20.9437 16.2722 22.4108C15.0307 23.4964 13.774 24.5642 12.5246 25.6408C11.6986 26.3523 11.1108 26.3607 10.2924 25.6397C8.05177 23.6657 5.79225 21.7125 3.59029 19.6964C2.35865 18.5686 1.33266 17.2553 0.638823 15.7086C-0.626904 12.8872 0.0324709 9.41204 2.22306 7.41034C4.84011 5.01855 8.81757 5.36918 11.1059 8.19281C11.1968 8.30475 11.2907 8.41404 11.4047 8.54989Z"
                  fill="#6E6D79"/>
            <circle cx="26.7662" cy="8" r="8" fill="#AE1C9A"/>
            <text x="26.7662" y="11" text-anchor="middle" fill="#F9FFFB" font-size="10" font-family="Arial"
                  font-weight="bold">
            </text>
             <text x="26.95" y="11" text-anchor="middle" fill="#fff" font-size="10" font-weight="bold">
                    {{ $wishlistCount }}
                </text>
        </svg>
    </span>
        <span class="cart-text">
        {{ __('website.wish_list') }}
        </span>
    </a>


</div>
