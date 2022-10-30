
<div class="alert alert-success" style="position: fixed;bottom:1rem; left: 50%; transform: translate(-50%, 0); transition: 500ms" role="alert" id="alart">
    {{$text}}
    <script>
        window.onload = (event) => {
            setTimeout(() => {
                document.getElementById('alart').style.opacity="0";
            }, 3000);
        };
    </script>
</div>