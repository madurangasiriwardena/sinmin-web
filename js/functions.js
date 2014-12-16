function ajax_call(method, word, categories, years, plot_func, draw_table){
	sent_calls = sent_calls+1
	var data;
	if(categories.length==0 & years.length!=0){
		data = JSON.stringify({"value":word,"time":years})
	}else if(years.length==0 & categories.length!=0){
		data = JSON.stringify({"value":word,"category":categories})
	}else if(years.length==0 & categories.length==0){
		data = JSON.stringify({"value":word})
	}else{
		data = JSON.stringify({"value":word,"time":years, "category":categories})
	}

	$.ajax({
        url: api_url+method,
        type: 'POST',
        data: data,
        headers: {
            'Content-Type': "application/json",
            Accept : "application/json"
        },
        success: function (data) {
        	data_calls.push.apply(data_calls, data);
        	success_calls = success_calls+1;
        	if(sent_calls == success_calls){
        		plot_func(data_calls);
        		draw_table(data_calls);
        	}
        },
        error: function (data) { console.log(data)},
    });
}