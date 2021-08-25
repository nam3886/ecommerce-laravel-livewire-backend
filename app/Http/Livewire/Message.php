<?php

namespace App\Http\Livewire;

class Message
{
    const STORE_SUCCESS                 =   ' was stored successfully!!!';
    const UPDATE_SUCCESS                =   ' was updated successfully!!!';
    const DELETE_SUCCESS                =   ' was deleted successfully!!!';
    const DEACTIVE_SUCCESS              =   ' has been successfully hidden!!!';
    const ACTIVE_SUCCESS                =   ' has been shown successfully!!!';

    const ADD_CART_SUCCESS              =   ' was added to cart!!!';
    const UPDATE_CART_SUCCESS           =   'The product was updated to cart!!!';
    const REMOVE_CART_SUCCESS           =   'The product was removed to cart!!!';
    const INVALID_CART_EX               =   'The cart does not contain this product!!!';
    const EMPTY_CART                    =   'The cart is empty!!!';

    const ADD_WISH_LIST_SUCCESS         =   ' was added to wish list!!!';
    const REMOVE_WISH_LIST_SUCCESS      =   'The product was removed to wish list!!!';
    const INVALID_WISH_LIST_EX          =   'The wish list does not contain this product!!!';
    const ITEM_EXIST_WISH_LIST          =   'The product is already on your wish list!!!';
    const TRANSFER_TO_CART              =   ' was transfer to cart!!!';

    const NEED_VOUCHER                  =   'Please add your voucher!!!';
    const ADD_VOUCHER_SUCCESS           =   'The voucher was added successfully!!!';
    const REMOVE_VOUCHER_SUCCESS        =   'The voucher was removed successfully!!!';
    const VOUCHER_NOT_AVAILABLE         =   'The voucher is not available!!!';
    const VOUCHER_NOT_CONTAIN_PRODUCT   =   'The voucher doesn\'t apply to products in your cart!!!';

    const ADD_RATING                    =   'Your rating has already been added!!!';
    const ADD_REVIEW                    =   'Your review has already been added!!!';

    const DATA_NOT_FOUND                =   'Data not found!!!';
    const PAYMENT_CANCELED              =   'Payment canceled!!!';
    const PAYMENT_NOT_COMPLETED         =   'Payment UnSuccessful! Something went wrong!';

    const FILE_NOT_FOUND                =   'File not found!!!';
    const NO_MATCHING_VARIANT           =   'There is no matching variation!!!';

    const OUT_OF_STOCK                  =   'Sorry, the product is out of stock!!!';
}
