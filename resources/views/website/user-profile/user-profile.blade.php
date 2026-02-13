@extends('layouts.website.app')

@section('title' ,  __('User Profile'))



@section('content')

    <section class="user-profile footer-padding">
        <div class="container">
            <div class="user-profile-section">
                <div class="dashboard-heading ">
                    <h5 class="dashboard-title">Change Password</h5>
                    <div class="dashboard-switch">
                        <span class="text">Switch Dashboard</span>
                        <span onclick="switchDashboard()" class="switch-icon"></span>
                    </div>
                </div>
                <div class="user-dashboard">

                      @livewire('website.dashboard.side-bar')

                    <div class="tab-content nav-content" id="v-pills-tabContent" style="flex: 1 0%;">
                        {{-- dashboard  --}}
                        @livewire('website.dashboard.dashboard',['authUser' => $authUser,'orderPaidCount' => $orderPaidCount,'orderDeliveredCount' => $orderDeliveredCount])
                        {{-- profile  --}}
                        @livewire('website.dashboard.info',['authUser'=>$authUser])
                        {{-- order  --}}
                        @livewire('website.dashboard.order',['authUser' => $authUser])
                        {{-- wishlist  --}}
                        @livewire('website.dashboard.wishlist')
                        {{-- review  --}}
                        @livewire('website.dashboard.review',['authUser' => $authUser])
                        {{-- password btn --}}
                        @livewire('website.dashboard.password')

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
