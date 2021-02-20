

$(document).ready(function() {

    function StaffMember(name,discountPercent){
        this.name = name;
        this.discountPercent = discountPercent;
    }
    
    // Create yourself again as 'me' with a staff discount of 20%
    var me = new StaffMember("Ceki", 20);
    
    
    var cashRegister = {
        total:0,
        lastTransactionAmount: 0,
        add: function(itemCost){
            this.total += (itemCost || 0);
            this.lastTransactionAmount = itemCost;
        },
        scan: function(item,quantity){
            switch (item){
    
                //qida
            case "pizza": this.add(100 * quantity); break;
            case "sushi": this.add(120 * quantity); break;
            case "shokolad": this.add(200 * quantity); break;
            case "clubsandvich": this.add(65 * quantity); break;
            case "burger": this.add(85 * quantity); break;
            case "stake": this.add(70 * quantity); break;
            case "chicken": this.add(150 * quantity); break;
            case "sezarsalad": this.add(20 * quantity); break;
            case "tunafish": this.add(65 * quantity); break;
    
            //icki
            case "cola": this.add(25 * quantity); break;
            case "fanta": this.add(25 * quantity); break;
            case "hell": this.add(45 * quantity); break;
            case "redbul": this.add(95 * quantity); break;
            case "vodka": this.add(350 * quantity); break;
            case "viski": this.add(130 * quantity); break;
    
    
            }
            return true;
        },
        voidLastTransaction : function(){
            this.total -= this.lastTransactionAmount;
            this.lastTransactionAmount = 0;
        },
        // Create a new method applyStaffDiscount here
        applyStaffDiscount: function(employee) {
            this.total -= this.total * (employee.discountPercent / 100);
            
        }
        
    };
    
    
    //cashRegister.applyStaffDiscount(me);
    
    
    // Hide all table result divs
    $("#resultcard .card-body .table-result").hide();
    
    //Toggle table result divs with clicking on related table
    
    $("#tabledetails .contain ").on("click", ".table", function() {
    
        var tabid = $(this).attr("id");
        
        
        $("#leftpanel .contain ul li p").removeAttr("class");
        $("#leftpanel .contain ul li p").addClass(tabid);
        $("#resultcard .card-body").children(".table-result").hide();
        $("#tabledetails .contain").children("#table"+ tabid +"").toggle();
        
    
    });
    
    // Show the total bill
    $("#tabledetails .contain .table div .inner b").html('Total: ' + cashRegister.total.toFixed(2) + ' Rs. ');
    
    
    
    //add qida to result-panel by clicking qidalar
    
    $("#leftpanel .contain ul li p").click(function() {
    
        var tabid = $(this).attr("class");
    
        if(tabid == null){
            alert("Please select table");
        }
        else {
    
        var orders = [];
        var yemek = $(this).attr("id"); // get the value of attribute id
        $("#resultcard .card-body #table" + tabid + ".table-result p").append("<span>" + yemek + ",</span>");
    
    }
    
    // click on table result items for deleting them
    $("#resultcard .card-body #table" + tabid + ".table-result p").on("click", "span", function() {
        $(this).remove();
    });
    
    
    // click to result table and show the price
    $("#resultcard .card-body #table" + tabid + ".table-result button#sum").click(function() {
    
        var metn = $("#resultcard .card-body #table" + tabid + ".table-result p").text(); // get the text of table result
        var letterorders = metn.length; // count characters from metn text
        var yemek2 = metn.substring(0, letterorders - 1); // cut the last comma 
        
        var orders = yemek2.split(",");
        
        var  count = {}; 
        orders.forEach(function(i) { count[i] = (count[i]||0)+1;  });
        cashRegister.total = 0;
        
        for(u = 0; u < orders.length; u++) {
            //cashRegister.total = 0;
            cashRegister.scan(orders[u],1);
    
    
        }
    
        console.log();
        $("#tabledetails .contain #" + tabid + ".table div .inner b").html('Total: ' + (cashRegister.total).toFixed(2) + '');
        
    
    });
    
    // here close the table and set the sum to zero
    $("#resultcard .card-body #table" + tabid + ".table-result button#close").click(function() {
    
    
        cashRegister.total = 0;
        $("#tabledetails .contain #" + tabid + ".table div .inner b").html('Total: ' + (cashRegister.total).toFixed(2) + '');
        $("#resultcard .card-body #table" + tabid + ".table-result p").empty();
        
    
    });
    
    
    });
    
    
    });
    