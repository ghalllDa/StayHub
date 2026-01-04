<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Ticket;
use Illuminate\Support\Str;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('room.hotel')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    public function approve(Booking $booking)
    {
        if ($booking->status !== 'paid') {
            return back()->withErrors('Booking belum dibayar');
        }

        // update status booking (FITUR LAMA - TETAP)
        $booking->update([
            'status' => 'approved'
        ]);

        // 🔥 FIX UTAMA: BUAT / UPDATE TIKET SEKALI SAJA
        Ticket::updateOrCreate(
            ['booking_id' => $booking->id],
            [
                'ticket_code' => 'TICKET-' . strtoupper(Str::random(8)),
                'check_in'    => $booking->check_in,
                'check_out'   => $booking->check_out,
            ]
        );

        return back()->with('success', 'Pesanan disetujui & tiket dibuat');
    }

    public function reject(Booking $booking)
    {
        $booking->update([
            'status' => 'rejected'
        ]);

        return back()->with('success', 'Pesanan ditolak');
    }
}
