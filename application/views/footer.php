	</div>
</body>

<script type="text/javascript">
  
  // SEARCH OPERATION
  //--------------------
  $("#_search_input").on("input",function(){
    // console.log($("#_search_input").val())

    // let name = ;
    let url;
    if($("#_search_input").val().length>1){
    	url = "<?= site_url('product/show_search_result')?>"+"/"+$("#_search_input").val()
	    	
    }
    else url = "<?= site_url('product/show_search_result')?>"+"/"+"_"

    $.get(
      url,
      function(data, status){
        $(".main").html(data)
        // console.log(parseHTML())
    });
  })

  // FOR ADMIN
  $("#_search_input_admin").on("input",function(){
    // console.log($("#_search_input").val())

    // let name = ;
    let url;
    if($("#_search_input_admin").val().length>1){
      url = "<?= site_url('product/show_search_result_admin')?>"+"/"+$("#_search_input_admin").val()
        
    }
    else url = "<?= site_url('product/show_search_result_admin')?>"+"/"+"_"

    $.get(
      url,
      function(data, status){
        $(".main").html(data)
        // console.log(parseHTML())
    });
  })
  //--------------------


</script>
</html>