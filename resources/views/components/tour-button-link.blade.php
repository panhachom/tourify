<style>

.link-tour-card{
    width: 230px;
    height: 200px;
    color: white; 
}
i {
    font-weight: bold; 
    font-size : 25px
}

</style>

<div class="link-tour-card bg-btn2">
    <div class="flex justify-center items-center w-full h-full">
        <div class="flex flex-col justify-center items-center gap-2">
            <i class="{{ $icon }}"></i>  
            <div class=" font-medium">{{ $tourType }}</div>
        </div>
    </div>
</div>