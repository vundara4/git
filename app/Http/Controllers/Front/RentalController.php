<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class RentalController extends Controller
{
    public function index()
    {
        $modules = [
            [
                'title' => 'Role & Permission Management',
                'description' => 'Manage platform admins, owners, renters, inspectors, and finance roles with time-window access control.',
                'status' => 'Core Module',
            ],
            [
                'title' => 'Activity Log',
                'description' => 'Record booking state changes, deposit transactions, condition reports, and inspection sign-offs.',
                'status' => 'Audit Trail',
            ],
            [
                'title' => 'Owner & Asset Listing Management',
                'description' => 'Create listings, upload photos, manage insurance documents, and route approvals.',
                'status' => 'Listing Workflow',
            ],
            [
                'title' => 'Availability Calendar & Pricing',
                'description' => 'Block dates, define pricing tiers, and control minimum/maximum rental durations.',
                'status' => 'Calendar Engine',
            ],
            [
                'title' => 'Booking & Reservation Management',
                'description' => 'Support booking requests, approvals, modifications, cancellation policies, and confirmations.',
                'status' => 'Reservation Flow',
            ],
            [
                'title' => 'Damage Deposit & Escrow',
                'description' => 'Capture deposits, hold funds during rentals, and release or deduct balances.',
                'status' => 'Escrow Logic',
            ],
            [
                'title' => 'Asset Condition & Inspection',
                'description' => 'Create pre/post-rental condition reports with evidence and inspector sign-off.',
                'status' => 'Inspection Workflow',
            ],
            [
                'title' => 'Late Return & Penalty',
                'description' => 'Track deadlines, calculate penalties, and manage dispute cases for overstay events.',
                'status' => 'Penalty Engine',
            ],
            [
                'title' => 'Review & Trust Score',
                'description' => 'Collect mutual reviews, calculate trust scores, and moderate disputes.',
                'status' => 'Trust Layer',
            ],
            [
                'title' => 'Revenue & Utilization Analytics',
                'description' => 'Monitor utilization, revenue per asset, damage frequency, and owner payouts.',
                'status' => 'Business Insight',
            ],
        ];

        $assets = [
            [
                'name' => 'City Van',
                'type' => 'Vehicle',
                'rate' => '$95/day',
                'availability' => 'Available today',
            ],
            [
                'name' => 'Studio Loft',
                'type' => 'Property',
                'rate' => '$220/day',
                'availability' => 'Booked until Jul 25',
            ],
            [
                'name' => 'Event Tent',
                'type' => 'Equipment',
                'rate' => '$60/day',
                'availability' => 'Available this weekend',
            ],
        ];

        return view('front.rental.index', compact('modules', 'assets'));
    }

    public function assets()
    {
        $assets = [
            [
                'name' => 'City Van',
                'type' => 'Vehicle',
                'rate' => '$95/day',
                'condition' => 'Excellent',
                'deposit' => '$300',
            ],
            [
                'name' => 'Studio Loft',
                'type' => 'Property',
                'rate' => '$220/day',
                'condition' => 'Good',
                'deposit' => '$800',
            ],
            [
                'name' => 'Event Tent',
                'type' => 'Equipment',
                'rate' => '$60/day',
                'condition' => 'Very Good',
                'deposit' => '$120',
            ],
        ];

        return view('front.rental.assets', compact('assets'));
    }
}
