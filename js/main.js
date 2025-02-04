window.onload = function () {
    //Start Pro Search Dropdown
    let menus = document.querySelectorAll(".Pro_Serach div ul");
    if(document.querySelector(".Pro_Serach")!=null){
        menus.forEach(menu => {
            //show menu when click on the span
            menu.parentElement.addEventListener("click", function () {
                if(event.target.tagName!="LI")
                {
                    menu.classList.toggle("enable");//show menu
                    this.querySelector("span").classList.toggle("rotate");//rotate down icon to up
                }
            })
            menu.querySelectorAll("li").forEach(function (li) {
    
                li.addEventListener("click", function () {
                   
                    this.classList.toggle("checked");
    
                    //get the name of term from  and get the hidden input
                    let term_name = ","+this.innerText;
                    let input=this.parentElement.parentElement.querySelector("input");
    
                     //add name term if its not found in input
                    if(this.classList.contains("checked"))
                    {
                    input.value+=term_name;
                    }
                    //remove id cat if found in input
                    else{
                        input.value=input.value.replace(term_name,"");
                    }
    
                })
            })
        });
        //remove input that not containes value or containes comma
        document.querySelector(".Pro_Serach button").addEventListener("click",function(){
            document.querySelectorAll(".Pro_Serach div input").forEach((input)=>{
                if(input.value=="")
                    input.remove();
            });
            });
            //close menu when click outside
        document.querySelector("body").addEventListener("click",()=>{
            menus.forEach((ul_elemnt)=>{
                let span_elment=ul_elemnt.parentElement.querySelector("span");
                if(ul_elemnt.classList.contains("enable")&&event.target!=ul_elemnt.parentElement&&
                event.target != span_elment && event.target.tagName != "LI" && event.target.tagName != "UL")
                {
                    ul_elemnt.classList.remove("enable")
                }
            })
        })
        
    }
    //End Pro Search Dropdown

    // Start Small Menu

    // show small menu when click the button
    document.querySelector(".header .Button_small_menu").addEventListener("click", function () {
        document.querySelector(".header .small_menu").classList.toggle("enable");
    })
    // show sub menu when click li elemnet
    document.querySelectorAll(".header .small_menu .menu .menu-item-has-children").forEach(function (li_item) {
        li_item.addEventListener("click", function () {
            this.querySelector(".sub-menu").classList.toggle("enable");
        })
    })
    document.querySelector("body").addEventListener("click", () => {
        let small_menu = document.querySelector(".header .small_menu");
        let button = document.querySelector(".header .Button_small_menu .fa-bars");
        //  hide small menu when click outside
        if (small_menu.classList.contains("enable") && event.target != button &&
            event.target.tagName != "A" && event.target.tagName != "LI" && event.target.tagName != "UL") {
            small_menu.classList.remove("enable");

        }
    })
    // End Small Menu

    // start ifram servers
    let ifram=document.querySelector(".main_single .video_iframe .iframe_continer iframe");
    let video=document.querySelector(".main_single .video_iframe .iframe_continer .video-js");
    let div_episodes=document.querySelector(".main_single .eps_container .all_episodes");
    if(ifram!=null){
        //scrolling to ifram
        // window.scrollTo(ifram.offsetWidth,
        //     ifram.offsetHeight-ifram.offsetHeight/4)
        let all_span_servers=document.querySelectorAll(".main_single .video_iframe .servers span");
        let wait_heading=document.querySelector(".main_single .video_iframe .iframe_continer h1");
        // set src iframe from first span url and show play icon 
        ifram.src=all_span_servers[0].getAttribute("data-url");
        all_span_servers[0].querySelector("i").classList.add("show");
        all_span_servers.forEach((span)=>{
           
             span.addEventListener("click",()=>{

                 // remove all play icons 
                 all_span_servers.forEach((span_edit)=>{
                 span_edit.querySelector("i").classList.remove("show");
                 })
                //add play icon on span clicked
                span.querySelector("i").classList.add("show");
                //if span of main server(musalsali)
            if(span.classList.contains("main_server")){
                // show video element 
            video.style.display="block";
            ifram.style.display="none";
            //stop iframe
            ifram.src="";
            }
            else{
                 // hide video element and pause it 
            video.style.display="none";
            ifram.style.display="block";
            document.querySelector("video").pause();
            //show wait heading and change src ifram
            wait_heading.classList.add("show");
            ifram.src="";
            setTimeout(()=>{
                ifram.src=span.getAttribute("data-url");
                wait_heading.classList.remove("show");
            },1500)
            }
           
        })
    })
    
    }
    if(video!=null){
        video.addEventListener("keydown",(KE)=>{
             let currenttime=video.player.currentTime();
             let currentvolume=video.player.volume();
            switch(KE.code){
                case "ArrowRight":
                    video.player.pause();
                    video.player.currentTime(currenttime+5);
                    video.player.play();
                    break;
                case "ArrowLeft":
                    video.player.pause();
                    video.player.currentTime(currenttime-5);
                    video.player.play();
                    break;
                case "ArrowUp":
                    video.player.volume(currentvolume+0.15);
                    break;
                case "ArrowDown":
                    video.player.volume(currentvolume-0.15);
                    break;
                case "Space":
                    if(!video.player.paused())
                    video.player.pause();
                    else
                    video.player.play();
                    break;
                    
            }
        })
    }    
       
    //start container episodes
    if(div_episodes!=null){
     let episodes=div_episodes.querySelectorAll("span");
        //hide prev span if its the first episode
         if(episodes[episodes.length-1].classList.contains("active"))
         {
             document.querySelector(".prev_eps").remove();
             document.querySelector(".next_eps a").setAttribute("href",episodes[episodes.length-2].querySelector("a").getAttribute("href"));
         }

         //hide next span if its the last episode
         else if(episodes[0].classList.contains("active"))
         {
             document.querySelector(".next_eps").remove();
             document.querySelector(".prev_eps a").setAttribute("href",episodes[1].querySelector("a").getAttribute("href"));
         }

         //if the episode in the center
        else{
            episodes.forEach(function(epi,i){
                if(epi.classList.contains("active"))
                {
                    document.querySelector(".next_eps a").setAttribute("href",episodes[i-1].querySelector("a").getAttribute("href"));
                    document.querySelector(".prev_eps a").setAttribute("href",episodes[i+1].querySelector("a").getAttribute("href"));

                }
            });
        }
     

     }
    //end container episodes
    
    // end ifram servers
}
