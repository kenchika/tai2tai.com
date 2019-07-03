
@extends('layouts.app')

<script src="{{ asset('js/profile.js') }}" defer></script>

@section('content')


<div class="container-fluid bg-white">
	<div class="row bg-primary py-5">
		<div class="col-12">
			<h1 class="mdc-typography--headline4 text-center text-capitalize font-weight-bold  text-white">{{ \Auth::user()->name }}</h1>
		</div>
		<div class="col-12">
			<div class=" mdc-typography--button  text-center text-white">

				{{ \Auth::user()->email }}
			</div>
		</div>
	</div>
	<div>
		<main class="bg-white container py-5"  >

			<div class="row ">
				<div class="col-md-6 col-sm-12 px-4 ">
					<div class=" mt-1 mb-3 text-left "  >
						<div class=" mdc-typography--button ">
							Me
						</div>
					</div>
					<div class=" container home-card bg-white py-5 px-5 mb-4" >
						<div class=" row pb-3">
							<div class="col-md-6 col-sm-12 mdc-typography--body1">
								<div class=" row">
									<i class="material-icons px-3">
										cake
									</i>


									<p class="my-auto text-left">
										{{  \Auth::user()->birth_date }}
									</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 pl-5 font-weight-normal mdc-typography--body1">
								<div class=" row d-flex justify-content-start">
									<i class="material-icons px-3">
										phone
									</i>


									<p class="my-auto" >
										{{  \Auth::user()->phone_number }}
									</p>
								</div>
							</div>

						</div>
						<div class=" row">
							<div class="col-md-6 col-sm-12 mdc-typography--body1">
								<div class=" row ">
									<i class="material-icons px-3">
										flag
									</i>


									<p class="my-auto text-left">
										{{ \Auth::user()->nationality }}
									</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 pl-5 font-weight-normal mdc-typography--body1">
								<div class=" row d-flex justify-content-start">
									<img src="{{URL::asset('img/wechatIcon.png')}}" width="70" class="px-3">


									<p class="my-auto">
										{{  \Auth::user()->wechat_id }}
									</p>
								</div>
							</div>

						</div>

					</div>
					<div class="row justfy-content-end">
						<div class="col" align=right>
							<button class="mdc-fab mr-5 my-fab" aria-label="Favorite"  data-toggle="modal" data-target="#infosModal" style="margin-top:-55px;">
								<span class="mdc-fab__icon material-icons">edit</span>
							</button>
						</div>
					</div>
					<div class=" mt-1 mb-3 text-left "  >
						<div class=" mdc-typography--button ">
							My skills
						</div>
					</div>
					<div class="container home-card bg-white py-5 px-5 "  >
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
					<div class="row justfy-content-start">
						<div class="col" align=left>
							<button class="mdc-fab mr-5 my-fab" aria-label="Favorite"  data-toggle="modal" data-target="#ContractModal" style="margin-top:-30px;">
								<span class="mdc-fab__icon material-icons">add</span>
							</button>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 px-4">
					<div class=" mt-1 mb-3 text-left "  >

						<span class=" mdc-typography--button ">
							My Contracts
						</span>
					</div>


					@forelse ($contracts as $contract)
					@if($loop->iteration==3)
					@break
					@endif
					<a href="{{ route('contract.show',[ 'user'=> Auth::id(), 'contract_id'=> $contract->id ]) }}" class=" text-dark text-decoration-none py-5"  >
						<div class="mb-5 home-card bg-white   "  >

							<div class="d-flex flex-row-reverse bd-highlight position-relative" style="margin-top:-20px;margin-right:40px;">

								<div class=" bd-highlight" >	<p  class="my-auto text-right py-2 mdc-typography--subtitle1 font-weight-bold text-white bg-primary px-3" style="border-radius:4px"> {{$contract->contractState}}</p></div>
							</div>


							<div class=" px-5 py-5" >
								<div class="row ">
									<div class="col  font-weight-normal ">
										<div align="left mdc-typography--button1">type</div>
									</div>
									<div class="col  font-weight-normal ">
										<div  align="right" class="font-weight-bold">{{$contract->type}}</div>
									</div>
								</div>
								<hr>
								<div class="row ">
									<div class="col  font-weight-normal mdc-typography--body1">
										<div align="left">Amount</div>
									</div>
									<div class="col  font-weight-normal ">
										<div  align="right" class="font-weight-bold">{{$contract->contractAmount.' ¥'}}</div>
									</div>
								</div>
								<hr>
								<div class="row ">
									<div class="col  font-weight-normal mdc-typography--body1">
										<div align="left">startingDate</div>
									</div>
									<div class="col  font-weight-normal ">
										<div  align="right" class="font-weight-bold">{{$contract->startingDate}}</div>
									</div>
								</div>
								<hr>
								<div class="row ">
									<div class="col  font-weight-normal mdc-typography--body1">
										<div align="left">endingDate</div>
									</div>
									<div class="col  font-weight-normal ">
										<div  align="right" class="font-weight-bold">{{$contract->endingDate}}</div>
									</div>
								</div>
								<hr>
								<div class="row ">
									<div class="col  font-weight-normal mdc-typography--body1">
										<div align="left">Client</div>
									</div>
									<div class="col  font-weight-normal ">
										<div  align="right" class="font-weight-bold">{{$contract->Contact->name}}</div>
									</div>
								</div>


							</div>
						</div>
					</a>
					@empty
					<div class="container home-card bg-white py-5 px-5 " >

						<div class="mdc-typography--body1">no contracts</div>


					</div>
					@endforelse
					<button class="mdc-button"  type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
						<span class="mdc-button__label">more</span>
						<i class="material-icons mdc-button__icon" aria-hidden="true">expand_more</i>
					</button>
					<div  class="collapse pt-5" id="collapseExample" >

						@forelse ($contracts as $contract)
						@if($loop->iteration>2)



						<a href="{{ route('contract.show',[ 'user'=> Auth::id(), 'contract_id'=> $contract->id ]) }}" class=" text-dark text-decoration-none py-5"  >
							<div class="mb-5 home-card bg-white   "  >

								<div class="d-flex flex-row-reverse bd-highlight position-relative" style="margin-top:-20px;margin-right:40px;">

									<div class=" bd-highlight" >	<p  class="my-auto text-right py-2 mdc-typography--subtitle1 font-weight-bold text-white bg-primary px-3" style="border-radius:4px"> {{$contract->contractState}}</p></div>
								</div>


								<div class=" px-5 py-5">
									<div class="row " >
										<div class="col  font-weight-normal ">
											<div align="left mdc-typography--button1">type</div>
										</div>
										<div class="col  font-weight-normal ">
											<div  align="right" class="font-weight-bold">{{$contract->type}}</div>
										</div>
									</div>
									<hr>
									<div class="row ">
										<div class="col  font-weight-normal mdc-typography--body1">
											<div align="left">Amount</div>
										</div>
										<div class="col  font-weight-normal ">
											<div  align="right" class="font-weight-bold">{{$contract->contractAmount}}</div>
										</div>
									</div>
									<hr>
									<div class="row ">
										<div class="col  font-weight-normal mdc-typography--body1">
											<div align="left">startingDate</div>
										</div>
										<div class="col  font-weight-normal ">
											<div  align="right" class="font-weight-bold">{{$contract->startingDate}}</div>
										</div>
									</div>
									<hr>
									<div class="row ">
										<div class="col  font-weight-normal mdc-typography--body1">
											<div align="left">endingDate</div>
										</div>
										<div class="col  font-weight-normal ">
											<div  align="right" class="font-weight-bold">{{$contract->endingDate}}</div>
										</div>
									</div>
									<hr>
									<div class="row ">
										<div class="col  font-weight-normal mdc-typography--body1">
											<div align="left">Client</div>
										</div>
										<div class="col  font-weight-normal ">
											<div  align="right" class="font-weight-bold">{{$contract->Contact->name}}</div>
										</div>
									</div>
									<hr>
									<div class="row ">
										<div class="col  font-weight-normal mdc-typography--body1">
											<div align="left">comment</div>
										</div>
										<div class="col  font-weight-normal ">
											<div  align="right" class="font-weight-bold">{{$contract->comment}}</div>
										</div>
									</div>






								</div>

							</div>



						</a>
						@endif
						@empty
						<div class="container home-card bg-white py-5 px-5 "  >

							<div class="mdc-typography--body1">no contracts</div>


						</div>

						@endforelse
					</div>
					<div class="row justfy-content-end">
						<div class="col" align=right>
							<button class="mdc-fab mr-5 my-fab" aria-label="Favorite"  data-toggle="modal" data-target="#ContractModal" style="margin-top:-30px;">
								<span class="mdc-fab__icon material-icons">add</span>
							</button>
						</div>
					</div>


				</div>

			</div>

		</main>

		<!-- Modal contract -->
		<div class="modal fade " id="ContractModal" tabindex="-100" role="dialog" aria-labelledby="contractModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg " role="document">
				<div class="modal-content home-card">
					<div class="modal-header" style="border:none;">
						<h5 class="modal-title mdc-typography--button" id="ContractModalLabel">add a new contract</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" >

						<form id="contractForm" action="{{ route('contract.add')}}" method="POST" name="contract" >
							@csrf
							@method('PUT')
							<div id="contactIdInput"></div>
							<div class="row mb-4">

								<div class="col" >
									<div class="toolbar mdc-menu-surface--anchor">
										<div class="mdc-text-field mdc-text-field--outlined contactTextField  ">
											<input type="text" id="contact" class="mdc-text-field__input" autocomplete="off">

											<div class="mdc-notched-outline">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
													<label for="tf-outlined" class="mdc-floating-label">Add an existing contact</label>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</div>

										<div class="mdc-menu mdc-menu-surface mdcContactsList" style="margin-top:60px;">
											<ul class="mdc-list" role="menu" id="contact_list" aria-hidden="true" aria-orientation="vertical" tabindex="-1">


											</ul>
										</div>
									</div>
								</div>

							</div>
							<div class="row ">

								<div class="col-md-3 col-sm-12" align=center>

									<div class="row justfy-content-center" >
										<div class="col-12 mb-3" >
											<div class="mdc-typography--button" class="font-weight-light ">Contact info </div>
										</div>
									</div>
									<div class="row mb-4">
										<div class="col" align=center>
											<div  id="contactName" class="mdc-text-field mdc-text-field--outlined">
												<input  class="mdc-text-field__input form-control"  name="contactName" required>
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label">contactName</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>


												</div>
											</div>
										</div>
									</div>

									<div class="row mb-4">
										<div class="col" align=center>
											<div id="contactFonction"  class="mdc-text-field mdc-text-field--outlined">
												<input  class="mdc-text-field__input form-control"  name="fonction" required>
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label">fonction</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>

												</div>
											</div>
										</div>
									</div>

									<div class="row mb-4">
										<div class="col" align=center>
											<div  id="phone_number" class="mdc-text-field mdc-text-field--outlined  mdc-text-field--disabled">
												<input class="mdc-text-field__input form-control"  name="phoneNumber" required>
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label">phoneNumber</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>

												</div>
											</div>
										</div>

									</div>


								</div>
								<div class="col-md-3 col-sm-12" align=center>
									<div class="row justfy-content-center" >
										<div class="col-12 mb-3" >
											<div class="mdc-typography--button" class="font-weight-light ">Contact adress </div>
										</div>
									</div>
									<div class="row mb-4">
										<div class="col" align=center>
											<div  id="adressName" class="mdc-text-field mdc-text-field--outlined  mdc-text-field--disabled">
												<input class="mdc-text-field__input form-control"  name="name" required>
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label">adress name</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>

												</div>
											</div>
										</div>

									</div>
									<div class="row mb-4">
										<div class="col" align=center>
											<div id="adressNumber"  class="mdc-text-field mdc-text-field--outlined  mdc-text-field--disabled">
												<input class="mdc-text-field__input form-control"  name="number" required>
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label">adress number</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>

												</div>
											</div>
										</div>

									</div>
									<div class="row mb-4">
										<div class="col" align=center>
											<div id="adressCity"  class="mdc-text-field mdc-text-field--outlined  mdc-text-field--disabled">
												<input class="mdc-text-field__input form-control"  name="city" required>
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label"> city</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>

												</div>
											</div>
										</div>

									</div>
									<div class="row mb-4">
										<div class="col" align=center>
											<div id="adressCountry"  class="mdc-text-field mdc-text-field--outlined  mdc-text-field--disabled">
												<input class="mdc-text-field__input form-control"  name="country" required>
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label"> country</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>

												</div>
											</div>
										</div>

									</div>
									<div class="row mb-4">
										<div class="col" align=center>
											<div  id="adressZip" class="mdc-text-field mdc-text-field--outlined  mdc-text-field--disabled">
												<input class="mdc-text-field__input form-control"  name="zip_code" required>
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label"> zip_code</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>

												</div>
											</div>
										</div>

									</div>
								</div>
								<div class="col-md-3 col-sm-12" align=center>
									<div class="row justfy-content-center" >
										<div class="col-12 mb-3" >
											<div class="mdc-typography--button" class="font-weight-light ">Contact comany infos </div>
										</div>
									</div>
									<div class="row mb-4">
										<div class="col" align=center>
											<div  id="englishName" class="mdc-text-field mdc-text-field--outlined  mdc-text-field--disabled">
												<input class="mdc-text-field__input form-control"  name="english_name" required>
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label"> english_name</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>

												</div>
											</div>
										</div>

									</div>
									<div class="row mb-4">
										<div class="col" align=center>
											<div  id="chineseName" class="mdc-text-field mdc-text-field--outlined  mdc-text-field--disabled">
												<input class="mdc-text-field__input form-control"  name="chinese_name" required>
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label"> chinese_name</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>

												</div>
											</div>
										</div>


									</div>

									<div class="row mb-4">
										<div class="col" align=center>
											<div  id="companyCountry" class="mdc-text-field mdc-text-field--outlined  mdc-text-field--disabled">
												<input class="mdc-text-field__input form-control"  name="company_country" required>
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label"> company_country</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>

												</div>
											</div>
										</div>


									</div>
									<div class="row mb-4">
										<div class="col" align=center>
											<div  id="companyPhone" class="mdc-text-field mdc-text-field--outlined  mdc-text-field--disabled">
												<input class="mdc-text-field__input form-control"  name="company_phone" required>
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label"> company_phone</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>

												</div>
											</div>
										</div>


									</div>
									<div class="row mb-4">
										<div class="col" align=center>
											<div  id="taxNumber" class="mdc-text-field mdc-text-field--outlined  mdc-text-field--disabled">
												<input class="mdc-text-field__input form-control"  name="tax_number" required>
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label"> tax_number</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>

												</div>
											</div>
										</div>


									</div>
								</div>
								<div class="col-md-3 col-sm-12" align=center>
									<div class="row justfy-content-center" >
										<div class="col-12 mb-3" >
											<div class="mdc-typography--button" class="font-weight-light ">Contact bank infos </div>
										</div>
									</div>
									<div class="row mb-4">
										<div class="col" align=center>
											<div id="contactBankAccount" class="mdc-text-field mdc-text-field--outlined  mdc-text-field--disabled">
												<input class="mdc-text-field__input form-control"  name="account_name" required>
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label">bank name</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>

												</div>
											</div>
										</div>

									</div>
									<div class="row mb-4">
										<div class="col" align=center>
											<div id="contactBankAccountNumber"  class="mdc-text-field mdc-text-field--outlined  mdc-text-field--disabled">
												<input class="mdc-text-field__input form-control"  name="account_number" required>
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label">account_number bank</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>

												</div>
											</div>
										</div>

									</div>

									<div class="row mb-4 justfy-content-start">
										<div class="col" align=center>
											<div id="contactBankBranch"  class="mdc-text-field mdc-text-field--outlined  mdc-text-field--disabled">
												<input class="mdc-text-field__input form-control"  name="bank_branch" required>
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label">bank_branch bank</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>

												</div>
											</div>
										</div>
									</div>



								</div>
							</div>
							<div class="row justify-content-start">
								<div class="col-md-3 col-sm-12">
									<div class="row" >
										<div class="col-12 mb-3" >
											<div class="mdc-typography--button" class="font-weight-light ">Contract infos </div>
										</div>
									</div>
									<div class="row">


										<input   class="mdc-text-field__input form-control"  name="state" value="DRAFT" type="hidden" >

									</div>
									<div class="row mb-4">
										<div class="col" align=center>
											<div class="mdc-select mdc-select--outlined container-fluid" id=contractType >
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">

													</div>
													<div class="mdc-notched-outline__trailing"></div>
												</div>
												<input type="hidden" name="type" value="package">
												<i class="mdc-select__dropdown-icon"></i>
												<div class="mdc-select__selected-text" >Package</div>
												<div class="mdc-select__menu mdc-menu mdc-menu-surface " style="z-index:10000" >
													<ul class="mdc-list">

														<li class="mdc-list-item" data-value="package" >
															Package
														</li>
														<li class="mdc-list-item" data-value="perTime">
															per Time
														</li>

													</ul>
												</div>


											</div>
										</div>
									</div>

									<div class="row mb-4">
										<div class="col" align=center>
											<div  id="amount" class="mdc-text-field mdc-text-field--outlined">
												<input  class="mdc-text-field__input form-control"  name="amount" required>
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label">Amount</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>


												</div>
											</div>
										</div>
									</div>

									<div class="row mb-4">
										<div class="col" align=center>
											<div class="mdc-text-field mdc-text-field--outlined">
												<input   class="mdc-text-field__input form-control"  name="comment" >
												<div class="mdc-notched-outline">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
														<label for="tf-outlined" class="mdc-floating-label">Comment</label>
													</div>
													<div class="mdc-notched-outline__trailing"></div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>



							<div class="col-12" align=center>
								<button  type=submit class="shadow-none mdc-button mdc-button--unelevated  mdc-button--outlined my-custom-button" >
									<span class="mdc-button__label ">Create a new contract</span>
								</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>



		<div class="modal fade " id="skillsModal" tabindex="-1" role="dialog" aria-labelledby="skillsModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered " role="document">
				<div class="modal-content my-img">
					<div class="modal-header mdc-typography--button" style="border:none;">
						<div class="col-12 pt-2" >
							add skills
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<i class="material-icons mdc-button__icon">close</i>
							</button>
						</div>
					</div>

					<div class="modal-body" >
						<div class="container" >
							<div class="row justfy-content-center" >
								<div class="col-6 " align=left>
									<form class=" py-auto">

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

											<div class="mdc-menu mdc-menu-surface mdcSkillsList" style="margin-top:60px">
												<ul class="mdc-list" role="menu" id="skill_list" aria-hidden="true" aria-orientation="vertical" tabindex="-1">

												</ul>
											</div>
										</div>


									</form>

								</div>
								<div class="col-6 my-2" align=left>
									<button type=submit class="shadow-none mdc-button mdc-button--unelevated  mdc-button--outlined my-custom-button"  id="validate" >
										<span class="mdc-button__label ">add</span>
									</button>

								</div>
							</div>
							<form action="{{route('skills.add')}}" method="GET" name="addSkills" id="chips">

							</form>

							<div class="row justfy-content-center" >
								<div class="col-12 mb-3" >
									<div class="mdc-typography--button" class="font-weight-light ">Delete a skill </div>
								</div>
							</div>
							<div class="row mx-1 justfy-content-start" >

								@forelse ($hardSkills as $skill)

								<form action="{{ route('skill.destroy')}}" method="post" type=hidden name="form{{$skill->id}}">
									@csrf
									@method('DELETE')
									<input name="skill_id" value="{{$skill->id}}" type="hidden"/>


									<div class="mdc-chip mr-2 " onClick="document.forms['form{{$skill->id}}'].submit();">
										<i class="material-icons mdc-chip__icon mdc-chip__icon--leading">remove_circle</i>
										<div class="mdc-chip__text">	{{ $skill->name }}</div>
									</div>

								</form>
								@empty
								<p>No hard skills yet</p>

								@endforelse

							</div>



						</div>


					</div>




				</div>
			</div>
		</div>
		<div class="modal fade " id="infosModal" tabindex="-1" role="dialog" aria-labelledby="skillsModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered " role="document">
				<div class="modal-content my-img">
					<div class="modal-header" style="border:none;">
						Edit my infos
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i class="material-icons mdc-button__icon">close</i>
						</button>
					</div>

					<div class="modal-body" >
						<div class="container" >
							<div class="row justfy-content-center" >
								<div class="col-12" align=center>


									<form action="{{ route('profile.edit')}}" method="post" name="wechat">
										@csrf
										@method('PUT')



										<div class="mdc-text-field mdc-text-field--outlined  mdc-text-field--with-trailing-icon">
											<input type="text"  name="wechat" class="mdc-text-field__input" autocomplete="off" required>
											<button class="material-icons mdc-text-field__icon"  tabindex="0"  type="submit" >edit</button>
											<div class="mdc-notched-outline">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
													<label for="tf-outlined" class="mdc-floating-label">Wechat id</label>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</div>


									</form>



								</div>

							</div>
							<form action="{{ route('profile.edit')}}" method="post" class="row">
								@csrf
								@method('PUT')
								<div class="col-md-6 col-sm-12" >
									<div class="mdc-select mdc-select--outlined container-fluid" id=phone >
										<div class="mdc-notched-outline">
											<div class="mdc-notched-outline__leading"></div>
											<div class="mdc-notched-outline__notch">

											</div>
											<div class="mdc-notched-outline__trailing"></div>
										</div>
										<input type="hidden" name="phone" value=86>
										<i class="mdc-select__dropdown-icon"></i>
										<div class="mdc-select__selected-text" ></div>
										<div class="mdc-select__menu mdc-menu mdc-menu-surface " style="z-index:10000" >
											<ul class="mdc-list">

												<li class="mdc-list-item" data-value="213">Algeria (+213)</li>
												<li class="mdc-list-item" data-value="376">Andorra (+376)</li>
												<li class="mdc-list-item" data-value="244">Angola (+244)</li>
												<li class="mdc-list-item" data-value="1264">Anguilla (+1264)</li>
												<li class="mdc-list-item" data-value="1268">Antigua &amp; Barbuda (+1268)</li>
												<li class="mdc-list-item" data-value="54">Argentina (+54)</li>
												<li class="mdc-list-item" data-value="374">Armenia (+374)</li>
												<li class="mdc-list-item" data-value="297">Aruba (+297)</li>
												<li class="mdc-list-item" data-value="61">Australia (+61)</li>
												<li class="mdc-list-item" data-value="43">Austria (+43)</li>
												<li class="mdc-list-item" data-value="994">Azerbaijan (+994)</li>
												<li class="mdc-list-item" data-value="1242">Bahamas (+1242)</li>
												<li class="mdc-list-item" data-value="973">Bahrain (+973)</li>
												<li class="mdc-list-item" data-value="880">Bangladesh (+880)</li>
												<li class="mdc-list-item" data-value="1246">Barbados (+1246)</li>
												<li class="mdc-list-item" data-value="375">Belarus (+375)</li>
												<li class="mdc-list-item" data-value="32">Belgium (+32)</li>
												<li class="mdc-list-item" data-value="501">Belize (+501)</li>
												<li class="mdc-list-item" data-value="229">Benin (+229)</li>
												<li class="mdc-list-item" data-value="1441">Bermuda (+1441)</li>
												<li class="mdc-list-item" data-value="975">Bhutan (+975)</li>
												<li class="mdc-list-item" data-value="591">Bolivia (+591)</li>
												<li class="mdc-list-item" data-value="387">Bosnia Herzegovina (+387)</li>
												<li class="mdc-list-item" data-value="267">Botswana (+267)</li>
												<li class="mdc-list-item" data-value="55">Brazil (+55)</li>
												<li class="mdc-list-item" data-value="673">Brunei (+673)</li>
												<li class="mdc-list-item" data-value="359">Bulgaria (+359)</li>
												<li class="mdc-list-item" data-value="226">Burkina Faso (+226)</li>
												<li class="mdc-list-item" data-value="257">Burundi (+257)</li>
												<li class="mdc-list-item" data-value="855">Cambodia (+855)</li>
												<li class="mdc-list-item" data-value="237">Cameroon (+237)</li>
												<li class="mdc-list-item" data-value="1">Canada (+1)</li>
												<li class="mdc-list-item" data-value="238">Cape Verde Islands (+238)</li>
												<li class="mdc-list-item" data-value="1345">Cayman Islands (+1345)</li>
												<li class="mdc-list-item" data-value="236">Central African Republic (+236)</li>
												<li class="mdc-list-item" data-value="56">Chile (+56)</li>
												<li class="mdc-list-item" data-value="86" >China (+86)</li>
												<li class="mdc-list-item" data-value="57">Colombia (+57)</li>
												<li class="mdc-list-item" data-value="269">Comoros (+269)</li>
												<li class="mdc-list-item" data-value="242">Congo (+242)</li>
												<li class="mdc-list-item" data-value="682">Cook Islands (+682)</li>
												<li class="mdc-list-item" data-value="506">Costa Rica (+506)</li>
												<li class="mdc-list-item" data-value="385">Croatia (+385)</li>
												<li class="mdc-list-item" data-value="53">Cuba (+53)</li>
												<li class="mdc-list-item" data-value="90392">Cyprus North (+90392)</li>
												<li class="mdc-list-item" data-value="357">Cyprus South (+357)</li>
												<li class="mdc-list-item" data-value="42">Czech Republic (+42)</li>
												<li class="mdc-list-item" data-value="45">Denmark (+45)</li>
												<li class="mdc-list-item" data-value="253">Djibouti (+253)</li>
												<li class="mdc-list-item" data-value="1809">Dominica (+1809)</li>
												<li class="mdc-list-item" data-value="1809">Dominican Republic (+1809)</li>
												<li class="mdc-list-item" data-value="593">Ecuador (+593)</li>
												<li class="mdc-list-item" data-value="20">Egypt (+20)</li>
												<li class="mdc-list-item" data-value="503">El Salvador (+503)</li>
												<li class="mdc-list-item" data-value="240">Equatorial Guinea (+240)</li>
												<li class="mdc-list-item" data-value="291">Eritrea (+291)</li>
												<li class="mdc-list-item" data-value="372">Estonia (+372)</li>
												<li class="mdc-list-item" data-value="251">Ethiopia (+251)</li>
												<li class="mdc-list-item" data-value="500">Falkland Islands (+500)</li>
												<li class="mdc-list-item" data-value="298">Faroe Islands (+298)</li>
												<li class="mdc-list-item" data-value="679">Fiji (+679)</li>
												<li class="mdc-list-item" data-value="358">Finland (+358)</li>
												<li class="mdc-list-item" data-value="33">France (+33)</li>
												<li class="mdc-list-item" data-value="594">French Guiana (+594)</li>
												<li class="mdc-list-item" data-value="689">French Polynesia (+689)</li>
												<li class="mdc-list-item" data-value="241">Gabon (+241)</li>
												<li class="mdc-list-item" data-value="220">Gambia (+220)</li>
												<li class="mdc-list-item" data-value="7880">Georgia (+7880)</li>
												<li class="mdc-list-item" data-value="49">Germany (+49)</li>
												<li class="mdc-list-item" data-value="233">Ghana (+233)</li>
												<li class="mdc-list-item" data-value="350">Gibraltar (+350)</li>
												<li class="mdc-list-item" data-value="30">Greece (+30)</li>
												<li class="mdc-list-item" data-value="299">Greenland (+299)</li>
												<li class="mdc-list-item" data-value="1473">Grenada (+1473)</li>
												<li class="mdc-list-item" data-value="590">Guadeloupe (+590)</li>
												<li class="mdc-list-item" data-value="671">Guam (+671)</li>
												<li class="mdc-list-item" data-value="502">Guatemala (+502)</li>
												<li class="mdc-list-item" data-value="224">Guinea (+224)</li>
												<li class="mdc-list-item" data-value="245">Guinea - Bissau (+245)</li>
												<li class="mdc-list-item" data-value="592">Guyana (+592)</li>
												<li class="mdc-list-item" data-value="509">Haiti (+509)</li>
												<li class="mdc-list-item" data-value="504">Honduras (+504)</li>
												<li class="mdc-list-item" data-value="852">Hong Kong (+852)</li>
												<li class="mdc-list-item" data-value="36">Hungary (+36)</li>
												<li class="mdc-list-item" data-value="354">Iceland (+354)</li>
												<li class="mdc-list-item" data-value="91">India (+91)</li>
												<li class="mdc-list-item" data-value="62">Indonesia (+62)</li>
												<li class="mdc-list-item" data-value="98">Iran (+98)</li>
												<li class="mdc-list-item" data-value="964">Iraq (+964)</li>
												<li class="mdc-list-item" data-value="353">Ireland (+353)</li>
												<li class="mdc-list-item" data-value="972">Israel (+972)</li>
												<li class="mdc-list-item" data-value="39">Italy (+39)</li>
												<li class="mdc-list-item" data-value="1876">Jamaica (+1876)</li>
												<li class="mdc-list-item" data-value="81">Japan (+81)</li>
												<li class="mdc-list-item" data-value="962">Jordan (+962)</li>
												<li class="mdc-list-item" data-value="7">Kazakhstan (+7)</li>
												<li class="mdc-list-item" data-value="254">Kenya (+254)</li>
												<li class="mdc-list-item" data-value="686">Kiribati (+686)</li>
												<li class="mdc-list-item" data-value="850">Korea North (+850)</li>
												<li class="mdc-list-item" data-value="82">Korea South (+82)</li>
												<li class="mdc-list-item" data-value="965">Kuwait (+965)</li>
												<li class="mdc-list-item" data-value="996">Kyrgyzstan (+996)</li>
												<li class="mdc-list-item" data-value="856">Laos (+856)</li>
												<li class="mdc-list-item" data-value="371">Latvia (+371)</li>
												<li class="mdc-list-item" data-value="961">Lebanon (+961)</li>
												<li class="mdc-list-item" data-value="266">Lesotho (+266)</li>
												<li class="mdc-list-item" data-value="231">Liberia (+231)</li>
												<li class="mdc-list-item" data-value="218">Libya (+218)</li>
												<li class="mdc-list-item" data-value="417">Liechtenstein (+417)</li>
												<li class="mdc-list-item" data-value="370">Lithuania (+370)</li>
												<li class="mdc-list-item" data-value="352">Luxembourg (+352)</li>
												<li class="mdc-list-item" data-value="853">Macao (+853)</li>
												<li class="mdc-list-item" data-value="389">Macedonia (+389)</li>
												<li class="mdc-list-item" data-value="261">Madagascar (+261)</li>
												<li class="mdc-list-item" data-value="265">Malawi (+265)</li>
												<li class="mdc-list-item" data-value="60">Malaysia (+60)</li>
												<li class="mdc-list-item" data-value="960">Maldives (+960)</li>
												<li class="mdc-list-item" data-value="223">Mali (+223)</li>
												<li class="mdc-list-item" data-value="356">Malta (+356)</li>
												<li class="mdc-list-item" data-value="692">Marshall Islands (+692)</li>
												<li class="mdc-list-item" data-value="596">Martinique (+596)</li>
												<li class="mdc-list-item" data-value="222">Mauritania (+222)</li>
												<li class="mdc-list-item" data-value="269">Mayotte (+269)</li>
												<li class="mdc-list-item" data-value="52">Mexico (+52)</li>
												<li class="mdc-list-item" data-value="691">Micronesia (+691)</li>
												<li class="mdc-list-item" data-value="373">Moldova (+373)</li>
												<li class="mdc-list-item" data-value="377">Monaco (+377)</li>
												<li class="mdc-list-item" data-value="976">Mongolia (+976)</li>
												<li class="mdc-list-item" data-value="1664">Montserrat (+1664)</li>
												<li class="mdc-list-item" data-value="212">Morocco (+212)</li>
												<li class="mdc-list-item" data-value="258">Mozambique (+258)</li>
												<li class="mdc-list-item" data-value="95">Myanmar (+95)</li>
												<li class="mdc-list-item" data-value="264">Namibia (+264)</li>
												<li class="mdc-list-item" data-value="674">Nauru (+674)</li>
												<li class="mdc-list-item" data-value="977">Nepal (+977)</li>
												<li class="mdc-list-item" data-value="31">Netherlands (+31)</li>
												<li class="mdc-list-item" data-value="687">New Caledonia (+687)</li>
												<li class="mdc-list-item" data-value="64">New Zealand (+64)</li>
												<li class="mdc-list-item" data-value="505">Nicaragua (+505)</li>
												<li class="mdc-list-item" data-value="227">Niger (+227)</li>
												<li class="mdc-list-item" data-value="234">Nigeria (+234)</li>
												<li class="mdc-list-item" data-value="683">Niue (+683)</li>
												<li class="mdc-list-item" data-value="672">Norfolk Islands (+672)</li>
												<li class="mdc-list-item" data-value="670">Northern Marianas (+670)</li>
												<li class="mdc-list-item" data-value="47">Norway (+47)</li>
												<li class="mdc-list-item" data-value="968">Oman (+968)</li>
												<li class="mdc-list-item" data-value="680">Palau (+680)</li>
												<li class="mdc-list-item" data-value="507">Panama (+507)</li>
												<li class="mdc-list-item" data-value="675">Papua New Guinea (+675)</li>
												<li class="mdc-list-item" data-value="595">Paraguay (+595)</li>
												<li class="mdc-list-item" data-value="51">Peru (+51)</li>
												<li class="mdc-list-item" data-value="63">Philippines (+63)</li>
												<li class="mdc-list-item" data-value="48">Poland (+48)</li>
												<li class="mdc-list-item" data-value="351">Portugal (+351)</li>
												<li class="mdc-list-item" data-value="1787">Puerto Rico (+1787)</li>
												<li class="mdc-list-item" data-value="974">Qatar (+974)</li>
												<li class="mdc-list-item" data-value="262">Reunion (+262)</li>
												<li class="mdc-list-item" data-value="40">Romania (+40)</li>
												<li class="mdc-list-item" data-value="7">Russia (+7)</li>
												<li class="mdc-list-item" data-value="250">Rwanda (+250)</li>
												<li class="mdc-list-item" data-value="378">San Marino (+378)</li>
												<li class="mdc-list-item" data-value="239">Sao Tome &amp; Principe (+239)</li>
												<li class="mdc-list-item" data-value="966">Saudi Arabia (+966)</li>
												<li class="mdc-list-item" data-value="221">Senegal (+221)</li>
												<li class="mdc-list-item" data-value="381">Serbia (+381)</li>
												<li class="mdc-list-item" data-value="248">Seychelles (+248)</li>
												<li class="mdc-list-item" data-value="232">Sierra Leone (+232)</li>
												<li class="mdc-list-item" data-value="65">Singapore (+65)</li>
												<li class="mdc-list-item" data-value="421">Slovak Republic (+421)</li>
												<li class="mdc-list-item" data-value="386">Slovenia (+386)</li>
												<li class="mdc-list-item" data-value="677">Solomon Islands (+677)</li>
												<li class="mdc-list-item" data-value="252">Somalia (+252)</li>
												<li class="mdc-list-item" data-value="27">South Africa (+27)</li>
												<li class="mdc-list-item" data-value="34">Spain (+34)</li>
												<li class="mdc-list-item" data-value="94">Sri Lanka (+94)</li>
												<li class="mdc-list-item" data-value="290">St. Helena (+290)</li>
												<li class="mdc-list-item" data-value="1869">St. Kitts (+1869)</li>
												<li class="mdc-list-item" data-value="1758">St. Lucia (+1758)</li>
												<li class="mdc-list-item" data-value="249">Sudan (+249)</li>
												<li class="mdc-list-item" data-value="597">Suriname (+597)</li>
												<li class="mdc-list-item" data-value="268">Swaziland (+268)</li>
												<li class="mdc-list-item" data-value="46">Sweden (+46)</li>
												<li class="mdc-list-item" data-value="41">Switzerland (+41)</li>
												<li class="mdc-list-item" data-value="963">Syria (+963)</li>
												<li class="mdc-list-item" data-value="886">Taiwan (+886)</li>
												<li class="mdc-list-item" data-value="7">Tajikstan (+7)</li>
												<li class="mdc-list-item" data-value="66">Thailand (+66)</li>
												<li class="mdc-list-item" data-value="228">Togo (+228)</li>
												<li class="mdc-list-item" data-value="676">Tonga (+676)</li>
												<li class="mdc-list-item" data-value="1868">Trinidad &amp; Tobago (+1868)</li>
												<li class="mdc-list-item" data-value="216">Tunisia (+216)</li>
												<li class="mdc-list-item" data-value="90">Turkey (+90)</li>
												<li class="mdc-list-item" data-value="7">Turkmenistan (+7)</li>
												<li class="mdc-list-item" data-value="993">Turkmenistan (+993)</li>
												<li class="mdc-list-item" data-value="1649">Turks &amp; Caicos Islands (+1649)</li>
												<li class="mdc-list-item" data-value="688">Tuvalu (+688)</li>
												<li class="mdc-list-item" data-value="256">Uganda (+256)</li>
												<li class="mdc-list-item" data-value="44">UK (+44)</li>
												<li class="mdc-list-item" data-value="380">Ukraine (+380)</li>
												<li class="mdc-list-item" data-value="971">United Arab Emirates (+971)</li>
												<li class="mdc-list-item" data-value="598">Uruguay (+598)</li>
												<li class="mdc-list-item" data-value="1">USA (+1)</li>
												<li class="mdc-list-item" data-value="7">Uzbekistan (+7)</li>
												<li class="mdc-list-item" data-value="678">Vanuatu (+678)</li>
												<li class="mdc-list-item" data-value="379">Vatican City (+379)</li>
												<li class="mdc-list-item" data-value="58">Venezuela (+58)</li>
												<li class="mdc-list-item" data-value="84">Vietnam (+84)</li>
												<li class="mdc-list-item" data-value="84">Virgin Islands - British (+1284)</li>
												<li class="mdc-list-item" data-value="84">Virgin Islands - US (+1340)</li>
												<li class="mdc-list-item" data-value="681">Wallis &amp; Futuna (+681)</li>
												<li class="mdc-list-item" data-value="969">Yemen (North)(+969)</li>
												<li class="mdc-list-item" data-value="967">Yemen (South)(+967)</li>
												<li class="mdc-list-item" data-value="260">Zambia (+260)</li>
												<li class="mdc-list-item" data-value="263">Zimbabwe (+263)</li>

											</ul>
										</div>


									</div>
								</div>
								<div class="col-md-6 col-sm-12" align=center>




									<div class="mdc-text-field mdc-text-field--outlined  mdc-text-field--with-trailing-icon">
										<input type="number"  name="number" class="mdc-text-field__input" autocomplete="off" required>
										<button class="material-icons mdc-text-field__icon"  tabindex="0"  type="submit" >edit</button>
										<div class="mdc-notched-outline">
											<div class="mdc-notched-outline__leading"></div>
											<div class="mdc-notched-outline__notch">
												<label for="tf-outlined" class="mdc-floating-label">phone Number</label>
											</div>
											<div class="mdc-notched-outline__trailing"></div>
										</div>
									</div>





								</div>

							</form>
							<div class="modal-footer" style="border:none;">

							</div>

						</div>


					</div>




				</div>
			</div>
		</div>
		</div>
	</div>
		<div class="mdc-snackbar"  style="    z-index: 1000000000;">
			<div class="mdc-snackbar__surface">
				<div class="mdc-snackbar__label"
				role="status"
				aria-live="polite">

			</div>
			<div class="mdc-snackbar__actions">
				<button type="button" class="mdc-button mdc-snackbar__action">ok</button>
			</div>
		</div>
	</div>
	@if($errors->any())
	<div class="mdc-snackbar mdc-snackbar-skill"  style="    z-index: 1000000000;">
		<div class="mdc-snackbar__surface">
			<div class="mdc-snackbar__label"
			role="status"
			aria-live="polite">
			{{$errors->first()}}
		</div>

		<div class="mdc-snackbar__actions">
			<button type="button" class="mdc-button mdc-snackbar__action">ok</button>
		</div>
	</div>
</div>

@endif
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
	$(document).on('click', '#skill_list li', function(){
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
	$(document).on('click', '#contact_list li', function(){

		// declare the value in the input field to a variable
		var value = $(this).text();

		// assign the value to the search box
		$('#contact').val(value.split(' ')[0]);
		// after click is done, search results segment is made empty
		$('#contact_list').html("");
		$('#contactIdInput').html('	<input name="contactId" id=contactId type="hidden" value="'+value.split(' ')[3]+'" >');

	});
});
</script>

@endsection
