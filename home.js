


var menuList=document.getElementById("nav-item-id");
menuList.style.maxHeight="0px";
function togglemenu(){
    if(menuList.style.maxHeight=="0px")
    {
        menuList.style.maxHeight="220px";
    }
    else
    {
        menuList.style.maxHeight="0px";
    }
}