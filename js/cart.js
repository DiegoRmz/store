/**
 * Script to hold the "cart" class that will contain the item's information to pass to the database
 * 
 * Version 1.0
 * 
 * Author: Diego A. Ramirez, for R2 consulting
 * 
 * Date: 10/04/2017
 * 
 * Notice this is the development version
 */

/**
 * Class that corresponds to the header in the backend side
 */
var Header = function(parameters) {
    this.ordNo; //Order number, generated by the database
    this.cliNo; //Client number, to get from the session
    this.facNo; //Plant number, to get from the session

    this.ordStatus; //Status of order
    this.ordDate; //Date of order, autogenerated
    this.ordTotal; //How much the client will pay, will be decimal on DB
}

/**
 * Class that corresponds to the header in the backend side
 */

var OrderItem = function(orNo, orIt, prSku, name, pcs, price) {
    this.ordNo = orNo; //Get from the header
    this.ordItem = orIt; //Get from table
    this.proSKU = prSku; //Identifier of the product
    this.ordProName = name; //Number of product
    this.ordPieces = pcs; //How many of each item was ordered
    this.unitPrice = price; //Price of the item
    this.ordTotal = unitPrice * ordPieces; //Total spent of that product

    this.getString = function() {
        return "";
    }

}