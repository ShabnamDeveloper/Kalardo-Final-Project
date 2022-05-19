@push('link')
@endpush
@component('admin.layouts.content')
    @slot('script')

        <script>
            $(document).ready(function() {
                let rtl = document.body.classList.contains('direction-rtl');
                $('.group').select2({
                    dir: rtl ? 'ltr' : 'rtl'
                });
                $('.brand').select2({
                    dir: rtl ? 'ltr' : 'rtl'
                });
                $('.users').select2({
                    dir: rtl ? 'ltr' : 'rtl'
                });
                $('.userCategory').select2({
                    dir: rtl ? 'ltr' : 'rtl'
                });
                $(".dirChanger img").click(function() {
                    rtl = document.body.classList.contains('direction-rtl');
                    $('.users').select2({
                        dir: rtl ? 'ltr' : 'rtl'
                    });
                    $('.userCategory').select2({
                        dir: rtl ? 'ltr' : 'rtl'
                    });
                    $('.brand').select2({
                        dir: rtl ? 'ltr' : 'rtl'
                    });
                    $('.group').select2({
                        dir: rtl ? 'ltr' : 'rtl'
                    });
                });
            });
            $('.startCalendar').persianDatepicker({
                initialValue: false
            });
            $('.endCalendar').persianDatepicker({
                initialValue: false
            });
            $('.startGovernCalendar').persianDatepicker({
                initialValue: false
            });
            $('.endGovernCalendar').persianDatepicker({
                initialValue: false
            });
            new FroalaEditor('#semiintroduction');
            new FroalaEditor('#fullintroduction');
            new FroalaEditor('#productDetail');
            tippy('#titleTooltip', {
                content: document.getElementById('tooltip').innerHTML,
                allowHTML: true,
            });
            tippy('#codeTooltip', {
                content: document.getElementById('subCodetooltip').innerHTML,
                allowHTML: true,
            });
            tippy('#tagTooltip', {
                content: document.getElementById('tagstooltip').innerHTML,
                allowHTML: true,
            });

        </script>

        <script>
            // removing tag
            function removeTag(elem) {
                elem.parentNode.parentNode.parentNode.removeChild(elem.parentNode.parentNode);
            }
            // adding tag
            let addTagInput = document.getElementById('tagValue');
            addTagInput.onkeydown = function(evt) {
                evt = evt || window.event
                var isEscape = false
                if ("key" in evt) {
                    isEscape = (evt.key === "Enter")
                } else {
                    isEscape = (evt.keyCode === 13)
                }
                if (isEscape) {
                    addTag();
                    evt.preventDefault();
                }
            };
            function addTag() {
                // event.preventDefault();
                // let title = document.getElementById('tagValue');
                let parentDiv = document.createElement("div"),
                    childDiv = document.createElement("div"),
                    innerDiv = document.createElement("div"),
                    italic = document.createElement("i"),
                    tagValue = document.createElement("span"),
                    allTags = document.querySelector(".allTags");
                parentDiv.classList.add();
                childDiv.classList.add();
                innerDiv.setAttribute();
                italic.classList.add();
                tagValue.classList.add();
                tagValue.innerText = addTagInput.value;
                innerDiv.appendChild(italic);
                childDiv.appendChild(innerDiv);
                childDiv.appendChild(tagValue);
                parentDiv.appendChild(childDiv);
                allTags.appendChild(parentDiv);
                addTagInput.value = "";
            }
            // choices component add warranty
            let newWarranty = document.getElementById("addWarranty");
            newWarranty.addEventListener("click", addWarranty);

            function addWarranty(e) {
                e.preventDefault();
                let list = document.getElementById("warrantyList"),
                    li = document.createElement("li"),
                    name = document.createElement("div"),
                    inputName = document.createElement("input"),
                    price = document.createElement("div"),
                    priceInnerDiv = document.createElement("div"),
                    priceInnerInput = document.createElement("input"),
                    priceInnerSelect = document.createElement("select"),
                    option1 = document.createElement("option"),
                    option2 = document.createElement("option");
                li.classList.add();
                name.classList.add();
                inputName.classList.add();
                inputName.setAttribute("type", "text");
                inputName.setAttribute();
                name.appendChild(inputName);
                price.classList.add();
                priceInnerDiv.classList.add();
                priceInnerInput.setAttribute("type", "text");
                priceInnerInput.setAttribute("placeholder", "میزان گارانتی");
                priceInnerInput.classList.add();
                priceInnerSelect.classList.add();
                option1.text = "تومان";
                option2.text = "ریال";
                priceInnerSelect.add(option1);
                priceInnerSelect.add(option2);
                priceInnerDiv.appendChild(priceInnerInput);
                priceInnerDiv.appendChild(priceInnerSelect);
                price.appendChild(priceInnerDiv);
                li.appendChild(name);
                li.appendChild(price);
                list.appendChild(li);
            }
            //    modal
            var openmodal = document.querySelectorAll('.modal-open')
            for (var i = 0; i < openmodal.length; i++) {
                openmodal[i].addEventListener('click', function(event) {
                    event.preventDefault()
                    toggleModal()
                })
            }

            const overlay = document.querySelector('.modal-overlay')
            overlay.addEventListener('click', toggleModal)

            var closemodal = document.querySelectorAll('.modal-close')
            for (var i = 0; i < closemodal.length; i++) {
                closemodal[i].addEventListener('click', toggleModal)
            }

            document.onkeydown = function(evt) {
                evt = evt || window.event
                var isEscape = false
                if ("key" in evt) {
                    isEscape = (evt.key === "Escape" || evt.key === "Esc")
                } else {
                    isEscape = (evt.keyCode === 27)
                }
                if (isEscape && document.body.classList.contains('modal-active')) {
                    toggleModal()
                }
            };

            // showing megamenu
            let isShow = false;


            function handleNewCategory() {
                let addTitle = document.querySelector(".addTitle-megaMenu");
                let Icon = document.querySelector(".newCatBtnIcon");
                isShow = !isShow;
                if (isShow) {
                    addTitle.classList.remove();
                    addTitle.classList.add();
                    Icon.classList.remove();
                    Icon.classList.add();
                } else {
                    addTitle.classList.remove();
                    addTitle.classList.add();
                    Icon.classList.remove();
                    Icon.classList.add();
                }
            }

            function megamenu() {
                let addBtn = document.querySelector(".addTitle-megaMenuBtn");
                addBtn.addEventListener("click", handleNewCategory);
                let addSubCat_1 = document.querySelector(".addTitle-subCatBtn-1");
                addSubCat_1.addEventListener("click", handleNewSubCategory)

            }
            // on enter for category titles
            let inputValue = document.querySelector(".newCatValue");
            inputValue.onkeydown = function(evt) {
                evt = evt || window.event
                var isEscape = false
                if ("key" in evt) {
                    isEscape = (evt.key === "Enter")
                } else {
                    isEscape = (evt.keyCode === 13)
                }
                if (isEscape && isShow) {
                    handleCategoryTitles();
                    evt.preventDefault();
                }
            };
            // on enter fpr category subtitles
            let subCatInputValue = document.querySelector(".newSubCatValue-1");
            subCatInputValue.addEventListener("keydown", function(evt) {
                evt = evt || window.event
                var isEscape = false
                if ("key" in evt) {
                    isEscape = (evt.key === "Enter")
                } else {
                    isEscape = (evt.keyCode === 13)
                }
                if (isEscape && subCatIsShow) {
                    handleAddSubCategory();
                    evt.preventDefault();
                }
            })
            // toggling modal
            function toggleModal() {
                const body = document.querySelector('body')
                const modal = document.querySelector('.modal')
                modal.classList.toggle()
                modal.classList.toggle()
                body.classList.toggle()
                if (body.classList.contains()) {
                    megamenu();
                }
            }

            function emptyInput() {
                inputValue.value = "";
            }
            // add category to megamenu
            let handdleCategoryBtn = document.querySelector(".newCatBtn");
            let categoryTitles = document.querySelector(".mainCategoryTitles");
            handdleCategoryBtn.addEventListener(
                "click", handleCategoryTitles);

            function handleCategoryTitles() {
                let inputValue = document.querySelector(".newCatValue").value,
                    li = document.createElement("li"),
                    link = document.createElement("a"),
                    span = document.createElement("span"),
                    arrow = document.createElement("i");
                link.setAttribute("href", "#");
                link.setAttribute("data-index", `${categoryTitles.childElementCount + 1}`);
                link.classList.add();
                span.innerText = inputValue;
                arrow.classList.add();
                link.appendChild(span);
                link.appendChild(arrow);
                li.appendChild(link);
                categoryTitles.appendChild(li);
                isShow = true;
                emptyInput();
                handleNewCategory();
            }

            // highlight selected title in megamenu

            let subCategories = document.getElementsByClassName("megaMenuSubcategory");
            let titleContainer = document.querySelector(".titleContainer");
            titleContainer.addEventListener(
                "mouseenter",
                function() {
                    let megaMenuTitles = document.getElementsByClassName("megaMenuTitles");
                    for (let i = 0; i < megaMenuTitles.length; i++) {
                        megaMenuTitles[i].addEventListener("click", function() {
                            for (let j = 0; j < megaMenuTitles.length; j++) {
                                megaMenuTitles[j].classList.remove("text-md");
                                megaMenuTitles[j].classList.add("text-sm");
                                megaMenuTitles[j].children[1].classList.remove("inline-block");
                                megaMenuTitles[j].children[1].classList.add("hidden");
                            }
                            megaMenuTitles[i].classList.remove("text-sm");
                            megaMenuTitles[i].classList.add("text-md");
                            megaMenuTitles[i].children[1].classList.remove("hidden");
                            megaMenuTitles[i].children[1].classList.add("inline-block");
                            for (let z = 0; z < subCategories.length; z++) {
                                subCategories[z].classList.remove("block");
                                subCategories[z].classList.add("hidden");
                                if (subCategories[z].id == `category-${megaMenuTitles[i].dataset.index}`) {
                                    subCategories[z].classList.remove("hidden");
                                    subCategories[z].classList.add("block");
                                }
                            }
                        })
                    }
                }
            )


            let subCatIsShow = false;
            // add title to subcategory-1

            function handleNewSubCategory() {
                let addSubCatInput = document.querySelector(".addTitle-subCat-1");
                let subCatIcon = document.querySelector(".newSubCatBtnIcon-1");
                subCatIsShow = !subCatIsShow;
                if (subCatIsShow) {
                    addSubCatInput.classList.remove("hidden");
                    addSubCatInput.classList.add("flex");
                    subCatIcon.classList.remove("lnir-circle-plus");
                    subCatIcon.classList.add("lnir-circle-minus");
                } else {
                    addSubCatInput.classList.remove("flex");
                    addSubCatInput.classList.add("hidden");
                    subCatIcon.classList.remove("lnir-circle-minus");
                    subCatIcon.classList.add("lnir-circle-plus");
                }
            }

            function emptySubCatInput() {
                // let subCatInputValue = document.querySelector(".newSubCatValue-1");
                subCatInputValue.value = "";
            }


            let handdleSubCategoryBtn = document.querySelector(".newSubCatBtn-1");
            let subCategoryTitles = document.querySelector(".mainSubCat-1");
            handdleSubCategoryBtn.addEventListener(
                "click", handleAddSubCategory);

            function handleAddSubCategory() {
                let subCatInputValuetxt = document.querySelector(".newSubCatValue-1").value,
                    li = document.createElement("li"),
                    link = document.createElement("a"),
                    span = document.createElement("span"),
                    arrow = document.createElement("i");
                link.setAttribute("href", "#");
                link.setAttribute("data-SubIndex", `${subCategoryTitles.childElementCount + 1}`);
                link.classList.add("subcat-megaMenu", "flex", "gap-2", "flex-row", "rtl:flex-row-reverse", "mb-4",
                    "text-sm", "text-trueGray-400", "dark:text-gray-400", "mr-4", "rtl:mr-auto", "rtl:ml-4");
                span.innerText = subCatInputValuetxt;
                arrow.classList.add("hidden", "lnir", "lnir-chevron-left", "transform", "rotate-0", "rtl:rotate-180");
                link.appendChild(span);
                link.appendChild(arrow);
                li.appendChild(link);
                subCategoryTitles.appendChild(li);
                subCatIsShow = true;
                emptySubCatInput();
                handleNewSubCategory();
            }

        </script>
    @endslot

    {{-- buttons --}}
    <div>
        <button>نمایش</button>
        <button>ذخیره</button>
    </div>

    {{-- content --}}
    <div>
        <form action="" x-data="{ openTab: 1 }">
            {{-- tabs --}}
            <div>
                <ul>
                    {{-- introduction --}}
                    <li  @click="openTab = 1" :class="{ '': openTab === 1 }">
                        <a
                            :class="openTab === 1 ? '' : ''"
                            href="#">معرفی کالا</a>
                    </li>

                    {{-- information --}}
                    <li @click="openTab = 2" :class="{ '': openTab === 2 }">
                        <a :class="openTab === 2 ? '' : ''"
                            href="#">مشخصات کالا</a>
                    </li>

                    {{-- price --}}
                    <li @click="openTab = 3" :class="{ '': openTab === 3 }">
                        <a
                            :class="openTab === 3 ? '' : ''"
                            href="#">قیمت گذاری</a>
                    </li>

                    {{-- choices --}}
                    <li @click="openTab = 4" :class="{ '': openTab === 4 }">
                        <a
                            :class="openTab === 4 ? '' : ''"
                            href="#">انتخاب ها</a>
                    </li>

                    {{-- related product --}}
                    <li @click="openTab = 6" :class="{ '': openTab === 6 }">
                        <a
                            :class="openTab === 6 ? '' : ''"
                            href="#">کالاهای مرتبط</a>
                    </li>

                    {{-- supply --}}
                    <li @click="openTab = 7" :class="{ '': openTab === 7 }">
                        <a
                            :class="openTab === 7 ? '' : ''"
                            href="#">تامین کنندگان</a>
                    </li>
                </ul>
            </div>

            {{-- body --}}
            <div>
                {{-- components --}}
                <div>
                    <x-product-introduction></x-product-introduction>
                    <x-product-specification></x-product-specification>
                    <x-product-price></x-product-price>
                    <x-product-choices></x-product-choices>
                    <x-product-seo></x-product-seo>
                    <x-product-related-items></x-product-related-items>
                    <x-product-suppliers></x-product-suppliers>
                </div>
                {{-- second coloumn --}}
                <div>
                    {{-- showing price --}}
                    <div>
                        <div>
                            <h2>قیمت</h2>
                            <div>
                                <span id="titleTooltip">
                                    <i>i</i>
                                </span>
                                <div id="tooltip">
                                    *قیمت نمایش داده شده روی محصول، پایین ترین نرخ کالا با احتساب نرخ های پیشنهادی تامین
                                    کنندگان، نرخ آزاد عرض، مالیات و درصد کمیسیون<br />
                                    *میزان مالیات بر ارزش افزوده ... می باشد<br />
                                </div>
                            </div>
                        </div>

                        <div>
                            <span>4080000</span>
                            <span>تومان</span>
                        </div>
                    </div>

                    {{-- show options --}}
                    <div>
                        <div>
                            <input type="radio" name="price" id="all" checked/>
                            <label for="all">نمایش قیمت برای همه</label>
                        </div>

                        <div>
                            <input type="radio" name="price" id="users"/>
                            <label for="users">نمایش قیمت برای دسته بندی کاربران</label>
                        </div>

                        <div>
                            <select class="users" name="">
                                <option value="AL">کارمندان</option>
                                <option value="WY">فروشندگان</option>
                            </select>
                        </div>

                        <div>
                            <input type="radio" name="price" id="soon"/>
                            <label for="sonn">نمایش عبارت "به زودی"</label>
                        </div>

                        <div>
                            <input type="radio" name="price" id="call"/>
                            <label for="call" >نمایش عبارت تماس بگیرید کاربران</label>
                        </div>
                    </div>

                    {{-- admin options --}}
                    <div>
                        <div>
                            <div>
                                تایید توسط مدیریت
                            </div>
                            <div >
                                <label>
                                    <input type="checkbox"
                                        checked="" />
                                    <i></i>
                                </label>
                            </div>
                        </div>
                        <div>
                            <div>
                                فعال
                            </div>
                            <div>
                                <label>
                                    <input type="checkbox"
                                        checked="" />
                                    <i></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- tags --}}
                    <div>
                        <div>
                            <h2>تگ ها</h2>
                            <div>
                                <span id="tagTooltip">
                                    <i>i</i>
                                </span>
                                <div class="hidden" id="tagstooltip">
                                    **اینجا قراره یه چیزایی نوشته بشه
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div>
                                    <div>
                                        <div onclick="removeTag(this)">
                                            <i></i>
                                        </div>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    {{-- <form action="" onsubmit="addTag(event)"> --}}
                                        <input type="text" name="" id="tagValue"
                                            placeholder="تگ جدید" />
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endcomponent
