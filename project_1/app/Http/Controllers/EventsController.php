<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function dashboardPage() {
        $events = Event::orderBy('start_date', 'asc')->get();
        $categories = Category::all();
        return view('dashboardPage', compact('events', 'categories'));
    }

    public function addEventForm() {
        $categories = Category::all();
        return view('events.addEventForm', compact('categories'));
    }

    public function addEvent(Request $request) {
        $request->validate([
            'title' => 'required|string|max:20',
            'description' => 'required|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'category_name' => 'required|exists:categories,name',
        ]);

        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->category_name = $request->category_name;

        $selectedCategory = Category::where('name', $request->category_name)->first();
        $event->category_id = $selectedCategory->id;

        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $event->image = $imagePath;
        }

        if($event->save()) {
            return redirect(route('dashboard-page'))->with('success', 'Event added successfully!');
        }
        else {
            return redirect(route('dashboard-page'))->with('error', 'Something went wrong!');
        }
    }

    public function editEventForm(int $id) {
        $event = Event::findOrFail($id);
        $categories = Category::all();
        return view('events.editEventForm', compact('event', 'categories'));
    }

    public function editEvent(Request $request, int $id) {
        $request->validate([
            'title' => 'required|string|max:20',
            'description' => 'required|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'category_name' => 'required|exists:categories,name',
        ]);

        $updatedEvent = Event::findOrFail($id);
        $updatedEvent->title = $request->title;
        $updatedEvent->description = $request->description;
        $updatedEvent->start_date = $request->start_date;
        $updatedEvent->end_date = $request->end_date;
        $updatedEvent->category_name = $request->category_name;

        $selectedCategory = Category::where('name', $request->category_name)->first();
        $updatedEvent->category_id = $selectedCategory->id;

        if($request->image) {
            if($request->hasFile('image')) {
                $updatedImagePath = $request->file('image')->store('images', 'public');
                $updatedEvent->image = $updatedImagePath;
            }
        } else {
            $updatedEvent->image = null;
        }

        if($updatedEvent->save()) {
            return redirect(route('dashboard-page'))->with('success', 'Event edited successfully!');
        }
        else {
            return redirect(route('dashboard-page'))->with('error', 'Something went wrong!');
        }
    }

    public function deleteEvent(int $id) {
        $result = Event::destroy($id);
        if($result) {
            return redirect(route('dashboard-page'))->with('success', 'Event deleted successfully!');
        }
        else {
            return redirect(route('dashboard-page'))->with('error', 'Something went wrong!');
        }
    }
}
