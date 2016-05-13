<?php

class SiteHelper {

    public static function getHostelName($id) {
        $hostel = Hostel::find($id);
        return $hostel->name;
    }

    public static function getCountyName($id) {
        $county = County::find($id);
        return $county->name;
    }

    public static function getCountryName($id) {
        $county = Country::find($id);
        return $county->name;
    }

    public static function getRoleName($id) {
        $role = Role::find($id);
        return $role->name;
    }

    public static function calculateItemTotal($cost, $no_of_nights, $no_of_guests) {
        $item_total = $cost * $no_of_nights * $no_of_guests;
        return number_format($item_total, 2);
    }

}
