(function($) {
"use strict";


// Multiselect dropdown
$('.multiselect').multiselect({
	buttonWidth: '100%',
	maxHeight: 500,
});
 
var site_url = $('#site_url').text();

// Ajax load division
if($('#id_division').length){
	
	if($('#user_organization_id').length){
		$('select[name="user_organization_id"]').on('change', function() {
			var user_organization_id = $(this).val();
			if(user_organization_id) {
				$.ajax({
					url: site_url+'/admin/ajax/organization/division/'+user_organization_id,
					type: "GET",
					dataType: "json",
					success:function(data) {
						
						$('select[name="id_division"]').empty();
						$('select[name="id_division"]').append('<option value="">Select Division</option>');
						$.each(data, function(key, value) {
							$('select[name="id_division"]').append('<option value="'+ key +'">'+ value +'</option>');
						});
					}
				});
			}else{
				$('select[name="id_division"]').empty();
				$('select[name="id_division"]').append('<option value="">Select Division</option>');
			}
		});
	}
	
	/*if($('#user_organization_ids').length){
		
		$('#user_organization_ids').on('change', function() {
				var user_organization_ids = $(this).val();
				
				$('select[name="id_division"]').empty();
				$('select[name="id_division"]').append('<option value="">Select Division</option>');
					
				if(user_organization_ids){
					var user_organization_ids = user_organization_ids.toString().split(',');
					
					var i;
					for (i = 0; i < user_organization_ids.length; i++) {
					
					 	var  user_organization_id= user_organization_ids[i];
						if(user_organization_id) {
							$.ajax({
								url: site_url+'/admin/ajax/organization/division/'+user_organization_id,
								type: "GET",
								dataType: "json",
								success:function(data) {
									$.each(data, function(key, value) {
										$('select[name="id_division"]').append('<option value="'+ key +'">'+ value +'</option>');
									});
									
									var optionValues =[];
									$('#id_division option').each(function(){
									   if($.inArray(this.value, optionValues) >-1){
										  $(this).remove()
									   }else{
										  optionValues.push(this.value);
									   }
									});
								}
							});
						}
					}
				}
				
		});
		
	}else */
	if($('#id_state').length){
		$('select[name="id_state"]').on('change', function() {
		var stateID = $(this).val();
		if(stateID) {
			$.ajax({
				url: site_url+'/admin/ajax/division/'+stateID,
				type: "GET",
				dataType: "json",
				success:function(data) {
					
					$('select[name="id_division"]').empty();
					$('select[name="id_division"]').append('<option value="">Select Division</option>');
					$.each(data, function(key, value) {
						$('select[name="id_division"]').append('<option value="'+ key +'">'+ value +'</option>');
					});
				}
			});
		}else{
			$('select[name="id_division"]').empty();
			$('select[name="id_division"]').append('<option value="">Select Division</option>');
		}
	});
	}
	
}
// Ajax load district
if($('#id_district').length){
	$('select[name="id_division"]').on('change', function() {
		var divisionId = $(this).val();
		if(divisionId) {
			$.ajax({
				url: site_url+'/admin/ajax/district/'+divisionId,
				type: "GET",
				dataType: "json",
				success:function(data) {
					
					$('select[name="id_district"]').empty();
					$('select[name="id_district"]').append('<option value="">Select District</option>');
					$.each(data, function(key, value) {
						$('select[name="id_district"]').append('<option value="'+ key +'">'+ value +'</option>');
					});
				}
			});
		}else{
			$('select[name="id_district"]').empty();
			$('select[name="id_district"]').append('<option value="">Select District</option>');
		}
	});
}

// Ajax load taluk
if($('#id_taluk').length){
	$('select[name="id_district"]').on('change', function() {
															
		var districtId = $(this).val();
		if(districtId) {
			$.ajax({
				url: site_url+'/admin/ajax/taluk/'+districtId,
				type: "GET",
				dataType: "json",
				success:function(response) {
					
					$('select[name="id_taluk"]').empty();
					
					$('select[name="id_taluk"]').append('<option value="">Select Taluk</option>');
					$.each(response.data, function(key, value) {
						$('select[name="id_taluk"]').append('<option value="'+ value.id_taluk +'">'+ value.taluk_name +'</option>');
					});
				}
			});
		}else{
			$('select[name="id_taluk"]').empty();
			$('select[name="id_taluk"]').append('<option value="">Select Taluk</option>');
		}
	});
}

// Ajax load destination
if($('#dm_destination_id').length){
	
	$('select[name="id_taluk"]').on('change', function() {
												   
		var talukId = $(this).val();
		if(talukId) {
			$.ajax({
				url: site_url+'/admin/ajax/destination/'+talukId,
				type: "GET",
				dataType: "json",
				success:function(response) {
					console.log(response.data);
					$('select[name="dm_destination_id"]').empty();
					$('select[name="dm_destination_id"]').append('<option value="">Select Destination</option>');
					$.each(response.data, function(key, value) {
						//$('select[name="dm_destination_id"]').append('<option value="'+ key +'">'+ value +'</option>');
						$('select[name="dm_destination_id"]').append('<option value="'+ value.id +'">'+ value.destination_name +'</option>');
					});
				}
			});
		}else{
			$('select[name="dm_destination_id"]').empty();
			$('select[name="dm_destination_id"]').append('<option value="">Select Destination</option>');
		}
	});
}

// Ajax load spot
if($('#dm_spot_id').length){
	$('select[name="dm_destination_id"]').on('change', function() {
		var destinationId = $(this).val();
		if(destinationId) {
			$.ajax({
				url: site_url+'/admin/ajax/spot/'+destinationId,
				type: "GET",
				dataType: "json",
				success:function(response) {
					
					$('select[name="dm_spot_id"]').empty();
					$('select[name="dm_spot_id"]').append('<option value="">Select Spot</option>');
					$.each(response.data, function(key, value) {
						$('select[name="dm_spot_id"]').append('<option value="'+ value.id +'">'+ value.spot_name +'</option>');
					});
				}
			});
		}else{
			$('select[name="dm_spot_id"]').empty();
			$('select[name="dm_spot_id"]').append('<option value="">Select Spot</option>');
		}
	});
}

// Ajax load spot
if($('#dm_sub_spot_id').length){
	$('select[name="dm_spot_id"]').on('change', function() {
		var spotId = $(this).val();
		if(spotId) {
			$.ajax({
				url: site_url+'/admin/ajax/subspot/'+spotId,
				type: "GET",
				dataType: "json",
				success:function(response) {
					
					$('select[name="dm_sub_spot_id"]').empty();
					$('select[name="dm_sub_spot_id"]').append('<option value="">Select Subspot</option>');
					$.each(response.data, function(key, value) {
						$('select[name="dm_sub_spot_id"]').append('<option value="'+ value.id +'">'+ value.sub_spot_name +'</option>');
					});
				}
			});
		}else{
			$('select[name="dm_sub_spot_id"]').empty();
			$('select[name="dm_sub_spot_id"]').append('<option value="">Select Subspot</option>');
		}
	});
}

  
  
})(jQuery);

function showLoader(){
	$(".loading").show();
	
	setTimeout(function(){ $(".loading").hide(); }, 4000);
}

function onlyAlphabets(e, t) {
 
 var charCode = e.which;
 	try {
		if (window.event) {
			var charCode = window.event.keyCode;
		}
		else if (e) {
			var charCode = e.which;
		}
		else { return true; }
		if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode == 32))
			return true;
		else
			return false;
	}
	catch (err) {
		alert(err.Description);
	}
}