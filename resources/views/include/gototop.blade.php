

    <button id="btn" onclick="GotoTop()" class="gototop animate__animated animate__bounce animate__infinite">
        <i class="fas fa-chevron-up " ></i>
    </button>


<script>

    const elem = document.getElementById("btn");

    function GotoTop(){
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    function myFunction(){

        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) 
        {
            elem.style.display = 'block';
        } 
        else 
        {
            elem.style.display = 'none';
        }
    }
          
</script> 

<script>
    new WOW().init();
</script>