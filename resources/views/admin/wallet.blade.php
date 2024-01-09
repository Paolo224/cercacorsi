@extends('layouts.admin')

@section('content')
    <h1 class="mt-3 mb-5 d-flex justify-content-between">
        <span>
            Wallet di {{Auth::user()->nome}} {{Auth::user()->cognome}}
        </span>
        <span>
            Saldo attuale: {{Auth::user()->saldo}}&euro;
        </span>
    </h1>
    <div class="row">
        <div class="col-12 mb-2">
            <h3>
                Scegli l'importo che Preferisci Caricare
            </h3>
        </div>
        <div class="col-3">
            <div class="box-ricarica-wallet d-flex align-items-center justify-content-between" data-value="20">
                <h3 class="fs-1">
                    20€
                </h3>
                <svg clip-rule="evenodd" fill-rule="evenodd" height="120" image-rendering="optimizeQuality" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" viewBox="0 0 1707 1707" width="120" xmlns="http://www.w3.org/2000/svg"><g id="Layer_x0020_1"><path d="m1269 1209c-77 0-144-42-179-104h-94c-30 0-30-46 0-46h75c-9-31-10-64-3-96h-72c-30 0-30-45 0-45h86c46-99 161-146 263-105 28 11 11 53-17 42-72-29-153-1-194 63h107c30 0 30 45 0 45h-127c-8 32-7 66 5 96h122c30 0 30 46 0 46h-96c44 54 118 74 183 48 28-11 45 31 17 42-24 10-50 14-76 14zm-84 317c-126 0-241-44-331-118-72 71-230 118-406 118-251 0-448-92-448-208v-929c0-117 197-208 448-208s450 92 448 208v180c344-229 811 17 811 435 0 288-235 522-522 522zm-365-149c-27-26-52-56-73-89-203 84-564 69-702-63v93c0 78 162 162 403 162 161 0 309-41 372-103zm-96-128c-21-38-36-80-47-123-199 54-506 33-632-87v93c0 79 162 163 403 163 102 0 201-17 276-46zm-56-167c-6-46-7-93-2-139-198 50-497 28-621-90v93c0 79 162 163 403 163 79 0 155-9 220-27zm6-188c12-57 34-110 63-158-203 78-555 62-692-68v92c0 79 162 163 403 163 81 0 159-10 226-29zm125-242c16-17 33-34 52-49v-121c-161 154-645 154-806 0v93c0 79 162 163 403 163 144 0 278-33 351-86zm386-125c-263 0-477 214-477 477s214 476 477 476c262 0 476-213 476-476s-214-477-476-477zm0 898c-233 0-422-189-422-421s189-421 422-421c232 0 421 189 421 421s-189 421-421 421zm0-797c-208 0-376 169-376 376s168 376 376 376c207 0 376-169 376-376s-169-376-376-376zm-737-402c-241 0-403 84-403 163s162 163 403 163c240 0 402-83 403-163-1-79-162-163-403-163z" fill="#333"/><g fill="#ffa721"><path d="m448 552c240 0 402-83 403-163-1-79-162-163-403-163s-403 84-403 163 162 163 403 163z"/><path d="m851 482c-161 154-645 154-806 0v93c0 79 162 163 403 163 144 0 278-33 351-86 16-17 33-34 52-49z"/><path d="m737 736c-203 78-555 62-692-68v92c0 79 162 163 403 163 81 0 159-10 226-29 12-57 34-110 63-158z"/><path d="m666 943c-198 50-497 28-621-90v93c0 79 162 163 403 163 79 0 155-9 220-27-6-46-7-93-2-139z"/><path d="m677 1126c-199 54-506 33-632-87v93c0 79 162 163 403 163 102 0 201-17 276-46-21-38-36-80-47-123z"/><path d="m747 1288c-203 84-564 69-702-63v93c0 78 162 162 403 162 161 0 309-41 372-103-27-26-52-56-73-89z"/><path d="m809 1004c0 207 168 376 376 376 207 0 376-169 376-376s-169-376-376-376c-208 0-376 169-376 376zm460 205c-77 0-144-42-179-104h-94c-30 0-30-46 0-46h75c-9-31-10-64-3-96h-72c-30 0-30-45 0-45h86c46-99 161-146 263-105 28 11 11 53-17 42-72-29-153-1-194 63h107c30 0 30 45 0 45h-127c-8 32-7 66 5 96h122c30 0 30 46 0 46h-96c44 54 118 74 183 48 28-11 45 31 17 42-24 10-50 14-76 14z"/><path d="m1185 1425c-233 0-422-189-422-421s189-421 422-421c232 0 421 189 421 421s-189 421-421 421zm-477-421c0 263 214 476 477 476 262 0 476-213 476-476s-214-477-476-477c-263 0-477 214-477 477z"/></g></g></svg>
            </div>
        </div>
        <div class="col-3">
            <div class="box-ricarica-wallet d-flex align-items-center justify-content-between" data-value="50">
                <h3 class="fs-1">
                    50€
                </h3>
                <svg clip-rule="evenodd" fill-rule="evenodd" height="120" image-rendering="optimizeQuality" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" viewBox="0 0 1707 1707" width="120" xmlns="http://www.w3.org/2000/svg"><g id="Layer_x0020_1"><path d="m1269 1209c-77 0-144-42-179-104h-94c-30 0-30-46 0-46h75c-9-31-10-64-3-96h-72c-30 0-30-45 0-45h86c46-99 161-146 263-105 28 11 11 53-17 42-72-29-153-1-194 63h107c30 0 30 45 0 45h-127c-8 32-7 66 5 96h122c30 0 30 46 0 46h-96c44 54 118 74 183 48 28-11 45 31 17 42-24 10-50 14-76 14zm-84 317c-126 0-241-44-331-118-72 71-230 118-406 118-251 0-448-92-448-208v-929c0-117 197-208 448-208s450 92 448 208v180c344-229 811 17 811 435 0 288-235 522-522 522zm-365-149c-27-26-52-56-73-89-203 84-564 69-702-63v93c0 78 162 162 403 162 161 0 309-41 372-103zm-96-128c-21-38-36-80-47-123-199 54-506 33-632-87v93c0 79 162 163 403 163 102 0 201-17 276-46zm-56-167c-6-46-7-93-2-139-198 50-497 28-621-90v93c0 79 162 163 403 163 79 0 155-9 220-27zm6-188c12-57 34-110 63-158-203 78-555 62-692-68v92c0 79 162 163 403 163 81 0 159-10 226-29zm125-242c16-17 33-34 52-49v-121c-161 154-645 154-806 0v93c0 79 162 163 403 163 144 0 278-33 351-86zm386-125c-263 0-477 214-477 477s214 476 477 476c262 0 476-213 476-476s-214-477-476-477zm0 898c-233 0-422-189-422-421s189-421 422-421c232 0 421 189 421 421s-189 421-421 421zm0-797c-208 0-376 169-376 376s168 376 376 376c207 0 376-169 376-376s-169-376-376-376zm-737-402c-241 0-403 84-403 163s162 163 403 163c240 0 402-83 403-163-1-79-162-163-403-163z" fill="#333"/><g fill="#ffa721"><path d="m448 552c240 0 402-83 403-163-1-79-162-163-403-163s-403 84-403 163 162 163 403 163z"/><path d="m851 482c-161 154-645 154-806 0v93c0 79 162 163 403 163 144 0 278-33 351-86 16-17 33-34 52-49z"/><path d="m737 736c-203 78-555 62-692-68v92c0 79 162 163 403 163 81 0 159-10 226-29 12-57 34-110 63-158z"/><path d="m666 943c-198 50-497 28-621-90v93c0 79 162 163 403 163 79 0 155-9 220-27-6-46-7-93-2-139z"/><path d="m677 1126c-199 54-506 33-632-87v93c0 79 162 163 403 163 102 0 201-17 276-46-21-38-36-80-47-123z"/><path d="m747 1288c-203 84-564 69-702-63v93c0 78 162 162 403 162 161 0 309-41 372-103-27-26-52-56-73-89z"/><path d="m809 1004c0 207 168 376 376 376 207 0 376-169 376-376s-169-376-376-376c-208 0-376 169-376 376zm460 205c-77 0-144-42-179-104h-94c-30 0-30-46 0-46h75c-9-31-10-64-3-96h-72c-30 0-30-45 0-45h86c46-99 161-146 263-105 28 11 11 53-17 42-72-29-153-1-194 63h107c30 0 30 45 0 45h-127c-8 32-7 66 5 96h122c30 0 30 46 0 46h-96c44 54 118 74 183 48 28-11 45 31 17 42-24 10-50 14-76 14z"/><path d="m1185 1425c-233 0-422-189-422-421s189-421 422-421c232 0 421 189 421 421s-189 421-421 421zm-477-421c0 263 214 476 477 476 262 0 476-213 476-476s-214-477-476-477c-263 0-477 214-477 477z"/></g></g></svg>
            </div>
        </div>
        <div class="col-3">
            <div class="box-ricarica-wallet d-flex align-items-center justify-content-between" data-value="100">
                <h3 class="fs-1">
                    100€
                </h3>
                <svg clip-rule="evenodd" fill-rule="evenodd" height="120" image-rendering="optimizeQuality" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" viewBox="0 0 1707 1707" width="120" xmlns="http://www.w3.org/2000/svg"><g id="Layer_x0020_1"><path d="m1269 1209c-77 0-144-42-179-104h-94c-30 0-30-46 0-46h75c-9-31-10-64-3-96h-72c-30 0-30-45 0-45h86c46-99 161-146 263-105 28 11 11 53-17 42-72-29-153-1-194 63h107c30 0 30 45 0 45h-127c-8 32-7 66 5 96h122c30 0 30 46 0 46h-96c44 54 118 74 183 48 28-11 45 31 17 42-24 10-50 14-76 14zm-84 317c-126 0-241-44-331-118-72 71-230 118-406 118-251 0-448-92-448-208v-929c0-117 197-208 448-208s450 92 448 208v180c344-229 811 17 811 435 0 288-235 522-522 522zm-365-149c-27-26-52-56-73-89-203 84-564 69-702-63v93c0 78 162 162 403 162 161 0 309-41 372-103zm-96-128c-21-38-36-80-47-123-199 54-506 33-632-87v93c0 79 162 163 403 163 102 0 201-17 276-46zm-56-167c-6-46-7-93-2-139-198 50-497 28-621-90v93c0 79 162 163 403 163 79 0 155-9 220-27zm6-188c12-57 34-110 63-158-203 78-555 62-692-68v92c0 79 162 163 403 163 81 0 159-10 226-29zm125-242c16-17 33-34 52-49v-121c-161 154-645 154-806 0v93c0 79 162 163 403 163 144 0 278-33 351-86zm386-125c-263 0-477 214-477 477s214 476 477 476c262 0 476-213 476-476s-214-477-476-477zm0 898c-233 0-422-189-422-421s189-421 422-421c232 0 421 189 421 421s-189 421-421 421zm0-797c-208 0-376 169-376 376s168 376 376 376c207 0 376-169 376-376s-169-376-376-376zm-737-402c-241 0-403 84-403 163s162 163 403 163c240 0 402-83 403-163-1-79-162-163-403-163z" fill="#333"/><g fill="#ffa721"><path d="m448 552c240 0 402-83 403-163-1-79-162-163-403-163s-403 84-403 163 162 163 403 163z"/><path d="m851 482c-161 154-645 154-806 0v93c0 79 162 163 403 163 144 0 278-33 351-86 16-17 33-34 52-49z"/><path d="m737 736c-203 78-555 62-692-68v92c0 79 162 163 403 163 81 0 159-10 226-29 12-57 34-110 63-158z"/><path d="m666 943c-198 50-497 28-621-90v93c0 79 162 163 403 163 79 0 155-9 220-27-6-46-7-93-2-139z"/><path d="m677 1126c-199 54-506 33-632-87v93c0 79 162 163 403 163 102 0 201-17 276-46-21-38-36-80-47-123z"/><path d="m747 1288c-203 84-564 69-702-63v93c0 78 162 162 403 162 161 0 309-41 372-103-27-26-52-56-73-89z"/><path d="m809 1004c0 207 168 376 376 376 207 0 376-169 376-376s-169-376-376-376c-208 0-376 169-376 376zm460 205c-77 0-144-42-179-104h-94c-30 0-30-46 0-46h75c-9-31-10-64-3-96h-72c-30 0-30-45 0-45h86c46-99 161-146 263-105 28 11 11 53-17 42-72-29-153-1-194 63h107c30 0 30 45 0 45h-127c-8 32-7 66 5 96h122c30 0 30 46 0 46h-96c44 54 118 74 183 48 28-11 45 31 17 42-24 10-50 14-76 14z"/><path d="m1185 1425c-233 0-422-189-422-421s189-421 422-421c232 0 421 189 421 421s-189 421-421 421zm-477-421c0 263 214 476 477 476 262 0 476-213 476-476s-214-477-476-477c-263 0-477 214-477 477z"/></g></g></svg>
            </div>
        </div>
        <div class="col-3">
            <div class="box-ricarica-wallet d-flex align-items-center justify-content-between" data-value="300">
                <h3 class="fs-1">
                    300€
                </h3>
                <svg clip-rule="evenodd" fill-rule="evenodd" height="120" image-rendering="optimizeQuality" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" viewBox="0 0 1707 1707" width="120" xmlns="http://www.w3.org/2000/svg"><g id="Layer_x0020_1"><path d="m1269 1209c-77 0-144-42-179-104h-94c-30 0-30-46 0-46h75c-9-31-10-64-3-96h-72c-30 0-30-45 0-45h86c46-99 161-146 263-105 28 11 11 53-17 42-72-29-153-1-194 63h107c30 0 30 45 0 45h-127c-8 32-7 66 5 96h122c30 0 30 46 0 46h-96c44 54 118 74 183 48 28-11 45 31 17 42-24 10-50 14-76 14zm-84 317c-126 0-241-44-331-118-72 71-230 118-406 118-251 0-448-92-448-208v-929c0-117 197-208 448-208s450 92 448 208v180c344-229 811 17 811 435 0 288-235 522-522 522zm-365-149c-27-26-52-56-73-89-203 84-564 69-702-63v93c0 78 162 162 403 162 161 0 309-41 372-103zm-96-128c-21-38-36-80-47-123-199 54-506 33-632-87v93c0 79 162 163 403 163 102 0 201-17 276-46zm-56-167c-6-46-7-93-2-139-198 50-497 28-621-90v93c0 79 162 163 403 163 79 0 155-9 220-27zm6-188c12-57 34-110 63-158-203 78-555 62-692-68v92c0 79 162 163 403 163 81 0 159-10 226-29zm125-242c16-17 33-34 52-49v-121c-161 154-645 154-806 0v93c0 79 162 163 403 163 144 0 278-33 351-86zm386-125c-263 0-477 214-477 477s214 476 477 476c262 0 476-213 476-476s-214-477-476-477zm0 898c-233 0-422-189-422-421s189-421 422-421c232 0 421 189 421 421s-189 421-421 421zm0-797c-208 0-376 169-376 376s168 376 376 376c207 0 376-169 376-376s-169-376-376-376zm-737-402c-241 0-403 84-403 163s162 163 403 163c240 0 402-83 403-163-1-79-162-163-403-163z" fill="#333"/><g fill="#ffa721"><path d="m448 552c240 0 402-83 403-163-1-79-162-163-403-163s-403 84-403 163 162 163 403 163z"/><path d="m851 482c-161 154-645 154-806 0v93c0 79 162 163 403 163 144 0 278-33 351-86 16-17 33-34 52-49z"/><path d="m737 736c-203 78-555 62-692-68v92c0 79 162 163 403 163 81 0 159-10 226-29 12-57 34-110 63-158z"/><path d="m666 943c-198 50-497 28-621-90v93c0 79 162 163 403 163 79 0 155-9 220-27-6-46-7-93-2-139z"/><path d="m677 1126c-199 54-506 33-632-87v93c0 79 162 163 403 163 102 0 201-17 276-46-21-38-36-80-47-123z"/><path d="m747 1288c-203 84-564 69-702-63v93c0 78 162 162 403 162 161 0 309-41 372-103-27-26-52-56-73-89z"/><path d="m809 1004c0 207 168 376 376 376 207 0 376-169 376-376s-169-376-376-376c-208 0-376 169-376 376zm460 205c-77 0-144-42-179-104h-94c-30 0-30-46 0-46h75c-9-31-10-64-3-96h-72c-30 0-30-45 0-45h86c46-99 161-146 263-105 28 11 11 53-17 42-72-29-153-1-194 63h107c30 0 30 45 0 45h-127c-8 32-7 66 5 96h122c30 0 30 46 0 46h-96c44 54 118 74 183 48 28-11 45 31 17 42-24 10-50 14-76 14z"/><path d="m1185 1425c-233 0-422-189-422-421s189-421 422-421c232 0 421 189 421 421s-189 421-421 421zm-477-421c0 263 214 476 477 476 262 0 476-213 476-476s-214-477-476-477c-263 0-477 214-477 477z"/></g></g></svg>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 mb-2">
            <h3>
                Oppure Indica l'importo che Preferisci
            </h3>
        </div>
        <div class="col-6 position-relative">
            <input type="text" id="customValue" placeholder="00€">
            <svg style="right: 10%; top: 50%; transform: translateY(-50%);" class="position-absolute" clip-rule="evenodd" fill-rule="evenodd" height="180" image-rendering="optimizeQuality" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" viewBox="0 0 1707 1707" width="180" xmlns="http://www.w3.org/2000/svg"><g id="Layer_x0020_1"><path d="m1269 1209c-77 0-144-42-179-104h-94c-30 0-30-46 0-46h75c-9-31-10-64-3-96h-72c-30 0-30-45 0-45h86c46-99 161-146 263-105 28 11 11 53-17 42-72-29-153-1-194 63h107c30 0 30 45 0 45h-127c-8 32-7 66 5 96h122c30 0 30 46 0 46h-96c44 54 118 74 183 48 28-11 45 31 17 42-24 10-50 14-76 14zm-84 317c-126 0-241-44-331-118-72 71-230 118-406 118-251 0-448-92-448-208v-929c0-117 197-208 448-208s450 92 448 208v180c344-229 811 17 811 435 0 288-235 522-522 522zm-365-149c-27-26-52-56-73-89-203 84-564 69-702-63v93c0 78 162 162 403 162 161 0 309-41 372-103zm-96-128c-21-38-36-80-47-123-199 54-506 33-632-87v93c0 79 162 163 403 163 102 0 201-17 276-46zm-56-167c-6-46-7-93-2-139-198 50-497 28-621-90v93c0 79 162 163 403 163 79 0 155-9 220-27zm6-188c12-57 34-110 63-158-203 78-555 62-692-68v92c0 79 162 163 403 163 81 0 159-10 226-29zm125-242c16-17 33-34 52-49v-121c-161 154-645 154-806 0v93c0 79 162 163 403 163 144 0 278-33 351-86zm386-125c-263 0-477 214-477 477s214 476 477 476c262 0 476-213 476-476s-214-477-476-477zm0 898c-233 0-422-189-422-421s189-421 422-421c232 0 421 189 421 421s-189 421-421 421zm0-797c-208 0-376 169-376 376s168 376 376 376c207 0 376-169 376-376s-169-376-376-376zm-737-402c-241 0-403 84-403 163s162 163 403 163c240 0 402-83 403-163-1-79-162-163-403-163z" fill="#333"/><g fill="#ffa721"><path d="m448 552c240 0 402-83 403-163-1-79-162-163-403-163s-403 84-403 163 162 163 403 163z"/><path d="m851 482c-161 154-645 154-806 0v93c0 79 162 163 403 163 144 0 278-33 351-86 16-17 33-34 52-49z"/><path d="m737 736c-203 78-555 62-692-68v92c0 79 162 163 403 163 81 0 159-10 226-29 12-57 34-110 63-158z"/><path d="m666 943c-198 50-497 28-621-90v93c0 79 162 163 403 163 79 0 155-9 220-27-6-46-7-93-2-139z"/><path d="m677 1126c-199 54-506 33-632-87v93c0 79 162 163 403 163 102 0 201-17 276-46-21-38-36-80-47-123z"/><path d="m747 1288c-203 84-564 69-702-63v93c0 78 162 162 403 162 161 0 309-41 372-103-27-26-52-56-73-89z"/><path d="m809 1004c0 207 168 376 376 376 207 0 376-169 376-376s-169-376-376-376c-208 0-376 169-376 376zm460 205c-77 0-144-42-179-104h-94c-30 0-30-46 0-46h75c-9-31-10-64-3-96h-72c-30 0-30-45 0-45h86c46-99 161-146 263-105 28 11 11 53-17 42-72-29-153-1-194 63h107c30 0 30 45 0 45h-127c-8 32-7 66 5 96h122c30 0 30 46 0 46h-96c44 54 118 74 183 48 28-11 45 31 17 42-24 10-50 14-76 14z"/><path d="m1185 1425c-233 0-422-189-422-421s189-421 422-421c232 0 421 189 421 421s-189 421-421 421zm-477-421c0 263 214 476 477 476 262 0 476-213 476-476s-214-477-476-477c-263 0-477 214-477 477z"/></g></g></svg>
        </div>
    </div>
    <form action="{{route('admin.pagamento')}}" method="post">
        @csrf
        <input id="prezzoInput" type="hidden" name="prezzo" value="">
        <button class="btn btn-outline-dark" type="submit">Prosegui con il Pagamento</button>
    </form>
@endsection