<footer>
    <ul class="nav ">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('myFavRecipes') }}"><i class="  far fa-heart"></i></a>
        </li>
        <li class="nav-item add-recipe-icon">
            <a href="#" role="button" class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#addRecipe"><i
                    class="fas fa-plus-circle "></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('myRecipes') }}"> <i class="fa-solid fa-book"></i></a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('myAccount') }}"><i class="fa fa-user"
                    aria-hidden="true"></i></a>
        </li>

    </ul>
</footer>
