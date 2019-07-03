
@extends('layouts.app')

<script src="{{ asset('js/profile.js') }}" defer></script>

@section('content')
<div class="container-fluid jarallax " style="background-image:url('../img/bg.jpg'); -webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;" >
<div class="container text-white">
	<div class="row py-4"></div>
	<div class="row my-padding"  >



		<div class="col-md-12 col-sm-12 my-5 py-md-5 py-sm-1 " align=center data-aos="fade-up" data-aos-offset="-10000" data-aos-anchor-placement="center-center"  data-aos-easing="ease-out-quad"  data-aos-duration="230">



		</div>
	</div>
</div>
</div>

<main class="bg-white main-raised py-5" style="    transform: translate3d(0px, 0px, 0px);" >
	<div class="row">
		<div class="col-md-12 col-sm-12 my-5" align= center >
			<img src="{{URL::asset('img/city.jpg')}}" class=" my-img mdc-elevation--z4" width="250px"  style="border-radius:100%; margin-top:-250px"/>



		</div>


	</div>

	<h1 class="mdc-typography--headline4 text-center text-capitalize font-weight-bold primary">{{ $user->name }}</h1>
	<div class=" mdc-typography--subtitle1  text-center ">

		{{ $user->email }}</div>
		<div class="container  bg-white px-md-2 my-5 px-sm-1" style="max-width:600px;    " data-aos="fade-up" data-aos-offset="-10000" data-aos-anchor-placement="center-center"  data-aos-easing="ease-out-quad"  data-aos-duration="200">






			<div class="row mb-4 mt-4">
				<div class="col-1  font-weight-normal mdc-typography--body1">
					<i class="material-icons">
						cake
					</i>

				</div>
				<div class="col-5 font-weight-normal mdc-typography--body1" align=left>
					<p class="my-auto text-left">
						{{ $user->birth_date }}
					</p>
				</div>
				<div class="col-1 font-weight-normal mdc-typography--body1">
					<i class="material-icons">
						phone
					</i>

				</div>
				<div class="col-5  font-weight-normal mdc-typography--body1" align=left>
					<p class="my-auto text-left">
						{{ $user->phone_number }}
					</p>
				</div>

			</div>


			<div class="row mb-4">
				<div class="col-1  font-weight-normal mdc-typography--body1">
					<i class="material-icons">
						flag
					</i>

				</div>
				<div class="col-5 font-weight-normal mdc-typography--body1" align=left>
					<p class="my-auto text-left">
						{{ $user->nationality }}
					</p>
				</div>
				<div class="col-1 font-weight-normal mdc-typography--body1">
					<i class="material-icons">
						chat
					</i>

				</div>
				<div class="col-5  font-weight-normal mdc-typography--body1" align=left>
					<p class="my-auto text-left">
						{{ $user->wechat_id }}
					</p>
				</div>
			</div>


			<!-- <div class="row ">
			<div class="col  font-weight-normal mdc-typography--body1">
			<div class="row ">
			<p class="mdc-typography--body1">wechat id :  {{ $user->wechat_id }}</p>
			<form action="{{ route('skill.edit')}}" method="post" name="wechat">
			@csrf
			@method('PUT')
			<input name="wechat" type="text"/>
			<button class="btn btn-danger" type="submit" >edit</button>
		</form>
	</div>
</div>
</div> -->

<div class="row mb-4 ">
	<div class="col-1  font-weight-normal mdc-typography--body1">
		<i class="material-icons">
			card_membership
		</i>

	</div>
	<div class="col-5 font-weight-normal mdc-typography--body1" align=left>
		<p class="my-auto text-left">

		</p>
	</div>
	<div class="col-1 font-weight-normal mdc-typography--body1">
		<i class="material-icons">
			credit_card
		</i>

	</div>
	<div class="col-5  font-weight-normal mdc-typography--body1 " align=left>
		<p class="my-auto text-left">
			
		</p>
	</div>
</div>


<hr>


<div class=" mt-1 mb-3 text-left "  >
	<div class=" mdc-typography--button ">
		My hard skills
	</div>


</div>
<div class="container home-card bg-white py-5 px-5 "  data-aos="fade-up" data-aos-offset="-10000" data-aos-anchor-placement="center-center"  data-aos-easing="ease-out-quad"  data-aos-duration="200">




	@forelse ($hardSkills as $skill)


	@if ($loop->first)
	<p class="my-auto text-left pb-2">	{{ $skill->name }}</p>
	<hr>
	@else


	<p class="my-auto text-left py-2">	{{ $skill->name }}</p>
	<hr>
	@endif

	@empty
	<p>No skill yet</p>
	@endforelse

</div>




		<div class="row justfy-content-end">
			<div class="col" align=right>
				<button class="mdc-fab mr-5 my-fab" aria-label="Favorite"  data-toggle="modal" data-target="#skillsModal" style="margin-top:-30px;">
					<span class="mdc-fab__icon material-icons">add</span>
				</button>
			</div>
		</div>

<div class=" mt-1 mb-3 text-left "  >
	<div class=" mdc-typography--button ">
		My Contracts
	</div>


</div>
			@forelse ($contracts as $contract)
			<div class="container home-card bg-white py-5 px-5 "  data-aos="fade-up" data-aos-offset="-10000" data-aos-anchor-placement="center-center"  data-aos-easing="ease-out-quad"  data-aos-duration="200">

				<h1 >contract amount :{{$contract->contractAmount}}</h1>
				<h1 >state : {{$contract->contractState}}</h1>
				<h1 >starting date : {{$contract->startingDate}}</h1>
				<h1 >signature date :{{$contract->signatureDate}}</h1>
				<h1 >ending date :{{$contract->endingDate}}</h1>
				@if(!empty($contract->Contact))
					<h1 >contact name : {{$contract->Contact->name}}</h1>
				@endif
				<a href="{{ route('contract.show',[ 'user'=> Auth::id(), 'contract_id'=> $contract->id ]) }}" >

				more
				</a>
				</div>

				<form action="{{ route('contract.destroy')}}" method="post" type=hidden name="form{{$contract->id}}">
					@csrf
					@method('DELETE')
					<input name="contract_id" value="{{$contract->id}}" type="hidden"/>
					<button type="submit" class="btn btn-danger">delete</button>

				</form>

				@empty
			<div class="container home-card bg-white py-5 px-5 "  data-aos="fade-up" data-aos-offset="-10000" data-aos-anchor-placement="center-center"  data-aos-easing="ease-out-quad"  data-aos-duration="200">

			<h1 >no contract</h1>


</div>

			@endforelse
<div class="row justfy-content-end">
	<div class="col" align=right>
		<button class="mdc-fab mr-5 my-fab" aria-label="Favorite"  data-toggle="modal" data-target="#ContractModal" style="margin-top:-30px;">
			<span class="mdc-fab__icon material-icons">add</span>
		</button>
	</div>
</div>



</div>




</div>







</div>

<div class="row">



</div>



</main>

<!-- Modal contract -->
<div class="modal fade" id="ContractModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ContractModalLabel">add a new contract</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

				<form action="{{ route('contract.add')}}" method="post" name="contract">
				@csrf
				@method('PUT')
				<div class="row">
					amount
        	<input  type="input" class=" mdc-text-field__input form-control" name="amount">
				</div>
				<div class="row">
					state
        	<input  type="input" class=" mdc-text-field__input form-control" name="state">
				</div>
				<div class="row">
					type
        	<input  type="input" class=" mdc-text-field__input form-control" name="type">
				</div>
				<div class="row">
					comment
        	<input  type="input" class=" mdc-text-field__input form-control" name="comment">
				</div>
				<div class="row">
					starting date
        	<input  type="input" class=" mdc-text-field__input form-control" name="startingDate">
				</div>
				<div class="row">
					Ending date
        	<input  type="input" class=" mdc-text-field__input form-control" name="endingDate">
				</div>
				<div class="row">
					signature date
        	<input  type="input" class=" mdc-text-field__input form-control" name="signatureDate">
				</div>
				<div class="row">

					<div class="toolbar mdc-menu-surface--anchor">
						<div class="mdc-text-field mdc-text-field--outlined contactTextField  ">
							<input type="text" id="contact" class="mdc-text-field__input" autocomplete="off">

							<div class="mdc-notched-outline">
								<div class="mdc-notched-outline__leading"></div>
								<div class="mdc-notched-outline__notch">
									<label for="tf-outlined" class="mdc-floating-label">Add a contact</label>
								</div>
								<div class="mdc-notched-outline__trailing"></div>
							</div>
						</div>

						<div class="mdc-menu mdc-menu-surface mdcContactsList" style="margin-top:60px;margin-left:100px;">
							<ul class="mdc-list" role="menu" id="contact_list" aria-hidden="true" aria-orientation="vertical" tabindex="-1">


							</ul>
						</div>
					</div>


				</div>
				<div class="row">
					client name
        	<input  type="input" class=" mdc-text-field__input form-control" name="contactName">
				</div>
				<div class="row">
					fonction
        	<input  type="input" class=" mdc-text-field__input form-control" name="fonction">
				</div>
				<div class="row">
					phone_number
        	<input  type="input" class=" mdc-text-field__input form-control" name="phoneNumber">
				</div>
				<div class="row">
					account_name  (bank account creation)
        	<input  type="input" class=" mdc-text-field__input form-control" name="account_name">
				</div>
				<div class="row">
					account_number
        	<input  type="input" class=" mdc-text-field__input form-control" name="account_number">
				</div>
				<div class="row">
					bank_branch
        	<input  type="input" class=" mdc-text-field__input form-control" name="bank_branch">
				</div>
				<div class="row">
					name of the address (adress creation)
        	<input  type="input" class=" mdc-text-field__input form-control" name="name">
				</div>
				<div class="row">
					number
        	<input  type="input" class=" mdc-text-field__input form-control" name="number">
				</div>
				<div class="row">
					city
        	<input  type="input" class=" mdc-text-field__input form-control" name="city">
				</div>
				<div class="row">
					country
        	<input  type="input" class=" mdc-text-field__input form-control" name="country">
				</div>
				<div class="row">
					zip_code
        	<input  type="input" class=" mdc-text-field__input form-control" name="zip_code">
				</div>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button class="btn btn-danger" type="submit" >add</button>
				</form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>



<div class="modal fade " id="skillsModal" tabindex="-1" role="dialog" aria-labelledby="skillsModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered " role="document">
		<div class="modal-content my-img">
			<div class="modal-header" style="border:none;">
				add hard skills
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="material-icons mdc-button__icon">close</i>
				</button>
			</div>

			<div class="modal-body" >
				<div class="container" >
					<div class="row justfy-content-center" >
						<div class="col-12" align=center>
							<form name="skillForm"  action="/profile/submit" method="GET">

								<div class="toolbar mdc-menu-surface--anchor">
									<div class="mdc-text-field mdc-text-field--outlined skillTextField  mdc-text-field--with-trailing-icon">
										<input type="text" id="skill" class="mdc-text-field__input" autocomplete="off">
										<i class="material-icons mdc-text-field__icon" id="addChips" tabindex="0" role="button">add_circle</i>
										<div class="mdc-notched-outline">
											<div class="mdc-notched-outline__leading"></div>
											<div class="mdc-notched-outline__notch">
												<label for="tf-outlined" class="mdc-floating-label">Add a skill</label>
											</div>
											<div class="mdc-notched-outline__trailing"></div>
										</div>
									</div>

									<div class="mdc-menu mdc-menu-surface mdcSkillsList" style="margin-top:60px;margin-left:100px;">
										<ul class="mdc-list" role="menu" id="skill_list" aria-hidden="true" aria-orientation="vertical" tabindex="-1">


										</ul>
									</div>
								</div>


							</form>

						</div>
						@forelse ($hardSkills as $skill)

						<form action="{{ route('skill.destroy')}}" method="post" type=hidden name="form{{$skill->id}}">
							@csrf
							@method('DELETE')
							<input name="skill_id" value="{{$skill->id}}" type="hidden"/>


							<div class="mdc-chip"  onClick="document.forms['form{{$skill->id}}'].submit();">
								<i class="material-icons mdc-chip__icon mdc-chip__icon--leading">clear</i>
								<div class="mdc-chip__text">	{{ $skill->name }}</div>
							</div>

						</form>

						@empty
						<p>No hard skills yet</p>

						@endforelse
					</div>
					<div class="row justfy-content-center" >
						<div class="col-12" align=center>
							<form action="/profile/submit" method="GET" name="addSkills" id="chips">
								<input name="skill_type" value="hard" type="hidden"/>

							</form>
							<button type=submit class=" shadow-none mdc-button mdc-button--unelevated  mdc-button--outlined " onclick="document.forms['addSkills'].submit();">
								<span class="mdc-button__label ">add</span>
							</button>
						</div>
					</div>
				</div>


			</div>




			<div class="modal-footer" style="border:none;">

			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
// jQuery wait till the page is fullt loaded
$(document).ready(function () {
	// keyup function looks at the keys typed on the search box
	$('#skill').on('keyup',function() {
		// the text typed in the input field is assigned to a variable
		var query = $(this).val();
		// call to an ajax function
		$.ajax({
			// assign a controller function to perform search action - route name is search
			url:"{{ route('skills.fetch') }}",
			// since we are getting data methos is assigned as GET
			type:"GET",
			// data are sent the server
			data:{'skill':query},
			// if search is succcessfully done, this callback function is called
			success:function (data) {
				// print the search results in the div called skill_list(id)
				$('#skill_list').html(data);
			}
		})
		// end of ajax call
	});

	// initiate a click function on each search result
	$(document).on('click', 'li', function(){
		// declare the value in the input field to a variable
		var value = $(this).text();
		// assign the value to the search box
		$('#skill').val(value);
		// after click is done, search results segment is made empty
		$('#skill_list').html("");
	});
});
</script>

<script type="text/javascript">
// jQuery wait till the page is fullt loaded
$(document).ready(function () {
	// keyup function looks at the keys typed on the search box
	$('#contact').on('keyup',function() {
		// the text typed in the input field is assigned to a variable
		var query = $(this).val();
		// call to an ajax function
		$.ajax({
			// assign a controller function to perform search action - route name is search
			url:"{{ route('contacts.fetch') }}",
			// since we are getting data methos is assigned as GET
			type:"GET",
			// data are sent the server
			data:{'contact':query},
			// if search is succcessfully done, this callback function is called
			success:function (data) {
				// print the search results in the div called skill_list(id)

				$('#contact_list').html(data);
			}
		})
		// end of ajax call
	});

		// initiate a click function on each search result
		$(document).on('click', 'li', function(){
			// declare the value in the input field to a variable
			var value = $(this).text();
			// assign the value to the search box
			$('#contact').val(value.split(' ')[0]);
			// after click is done, search results segment is made empty
			$('#contact_list').html("");
		});
	});
	</script>

@endsection
