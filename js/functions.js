function ajax_call(method, word, categories, years, plot_func, draw_table){
	sent_calls = sent_calls+1
	var data;
	if(categories.length==0 & years.length!=0){
		data = {"time":years}
	}else if(years.length==0 & categories.length!=0){
		data = {"category":categories}
	}else if(years.length==0 & categories.length==0){
		data = {}
	}else{
		data = {"time":years, "category":categories}
	}

	if(word.length == 1){
		data["value"] = word[0];
	}else if(word.length == 2){
		data["value1"] = word[0];
		data["value2"] = word[1];
	}else if(word.length == 3){
		data["value1"] = word[0];
		data["value2"] = word[1];
		data["value3"] = word[2];
	}

	data = JSON.stringify(data);

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