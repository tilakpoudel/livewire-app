<div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          	<a class="navbar-brand" href="#">Livewire App</a>
          	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            	<span class="navbar-toggler-icon"></span>
          	</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}" wire:navigate>Dashboard</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('counter') }}" wire:navigate>Counter</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('posts') }}" wire:navigate>Posts</a>
				</li>
				</ul>
			</div>
        </div>
      </nav>
</div>
