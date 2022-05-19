<?php

namespace App\Http\Livewire\Catalog\Shop;

use App\Models\City;
use App\Models\State;
use App\Models\User;
use Livewire\Component;

class Address extends Component
{
    public $address, $city_id, $state_id, $phone, $adres, $postcode, $approved, $address_id;
    public $isOpen = 0;


    public function render()
    {

        $this->address = auth()->user()->addresses()->where('approved', 1)->first() ?? null;

        return view('livewire.catalog.shop.address');
    }

    public function change_city($id)
    {
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {

        $this->city_id = '';
        $this->state_id = '';
        $this->address_id = '';
        $this->phone = '';
        $this->adres = '';
        $this->postcode = '';
        $this->approved = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'state_id' => 'required',
            'city_id' => 'required',
            'address_id' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'postcode' => 'required',
            'approved' => 'required',
        ]);

        \App\Models\Address::updateOrCreate(['id' => $this->address_id], [
            'state_id' => $this->state_id,
            'city_id' => $this->city_id,
            'address' => $this->adres,
            'phone' => $this->phone,
            'postcode' => $this->postcode,
            'approved' => $this->approved,
        ]);
//
//        session()->flash('message',
//            $this->post_id ? 'Post Updated Successfully.' : 'Post Created Successfully.');
//
//        $this->closeModal();
//        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
//        $address, $city_id, $state_id, $phone, $adres, $postcode, $approved, $address_id;
        $Address = \App\Models\Address::findOrFail($id);
//        $stateId=State::findOrFail(5);
//        $city=City::where('state_id',5)->get();
        $this->address_id = $id;
        $this->state_id = $Address->state_id;
        $this->city_id = $Address->city_id;
        $this->adres = $Address->address;
        $this->phone = $Address->phone;
        $this->postcode = $Address->postcode;
        $this->approved = $Address->approved;
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        \App\Models\Address::find($id)->delete();
        session()->flash('message', 'آدرس بدرستی حذف شد.');
    }
}
