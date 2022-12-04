
// sidebarBurgerButton.addEventListener('click' , function () {
//     sidebarBlock.style.left = '0px';
//     sidebarBurgerButton.style.left = "300px";
//     // document.getElementById('sidebarBurgerBlock').style.left = '300px';
//     // consoloe.log(sidebarBlock);
//     // console.log(burgerMenuButton);
// });

// sidebarBurgerButton.addEventListener("DOMContentLoaded", () => {

//     const sidebarBurgerButton = document.getElementById('sidebarBurgerButton');
//     const sidebarBlock = document.getElementById('sidbarBlock');
    
//     sidebarBurgerButton.

// });


    const sidebarBurgerButton = document.getElementById('sidebarBurgerButton');
    const sidebarBlock = document.getElementById('sidebarBlock');

    sidebarBurgerButton.addEventListener('mousedown' , (e) => {
        // if(sidebarBlock.classList.contains('moveSidebar') && sidebarBurgerButton.classList.contains('moveBurgerButton'))
        // {
        //     sidebarBlock.classList.remove('moveSidebar');
        //     sidebarBlock.classList.toggle('closeSidebar');

        //     sidebarBurgerButton.classList.remove('moveBurgerButton');
        //     sidebarBurgerButton.classList.toggle('burgerSmoothAnimationClose');
        // }
        // if()
        e.stopImmediatePropagation();




        if(sidebarBlock.classList.contains("moveSidebar"))
        {
            sidebarBlock.classList.remove("moveSidebar");
            sidebarBurgerButton.classList.remove("moveBurgerButton");

            sidebarBlock.classList.toggle('closeSidebar');
            sidebarBurgerButton.classList.toggle('burgerSmoothAnimationClose');
        }
        else
        {
            sidebarBlock.classList.toggle("moveSidebar");
            sidebarBurgerButton.classList.toggle("moveBurgerButton");   
            
        }
    });