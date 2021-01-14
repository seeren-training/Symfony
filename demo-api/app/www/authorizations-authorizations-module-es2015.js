(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["authorizations-authorizations-module"],{

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/authorizations/authorizations.component.html":
/*!****************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/authorizations/authorizations.component.html ***!
  \****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<ion-tabs>\n    <ion-tab-bar slot=\"bottom\">\n        <ion-tab-button tab=\"login\">\n            <ion-label>Login</ion-label>\n        </ion-tab-button>\n        <ion-tab-button tab=\"register\">\n            <ion-label>Register</ion-label>\n        </ion-tab-button>\n    </ion-tab-bar>\n</ion-tabs>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/authorizations/login/login.component.html":
/*!*************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/authorizations/login/login.component.html ***!
  \*************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<ion-header>\n  <ion-toolbar>\n    <ion-title>Login</ion-title>\n  </ion-toolbar>\n</ion-header>\n<ion-content class=\"ion-padding\">\n  <h1>\n    <span *ngIf=\"!error else title\">Login to the app</span>\n    <ng-template #title>\n      <ion-text class=\"ion-padding\" color=\"danger\">{{ error }}</ion-text>\n    </ng-template>\n  </h1>\n  <form [formGroup]=\"form\" (ngSubmit)=\"login()\">\n    <ion-item>\n      <ion-label position=\"floating\">Email</ion-label>\n      <ion-input type=\"email\" formControlName=\"email\"></ion-input>\n    </ion-item>\n    <br />\n    <ion-item>\n      <ion-label position=\"floating\">Password</ion-label>\n      <ion-input type=\"password\" formControlName=\"password\"></ion-input>\n    </ion-item>\n    <br />\n    <ion-button *ngIf=\"!loadingService.login else loading\" type=\"submit\" [disabled]=\"!form.valid\">Submit</ion-button>\n    <ng-template #loading>\n      <ion-spinner name=\"crescent\"></ion-spinner>\n    </ng-template>\n  </form>\n</ion-content>");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/app/authorizations/register/register.component.html":
/*!*******************************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/authorizations/register/register.component.html ***!
  \*******************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("<ion-header>\n    <ion-toolbar>\n        <ion-title>Register</ion-title>\n    </ion-toolbar>\n</ion-header>\n<ion-content class=\"ion-padding\">\n    <h1>\n        <span *ngIf=\"!error else title\">Login to the app</span>\n        <ng-template #title>\n            <ion-text class=\"ion-padding\" color=\"danger\">{{ error }}</ion-text>\n        </ng-template>\n    </h1>\n    <form [formGroup]=\"form\" (ngSubmit)=\"register()\">\n        <ion-item>\n            <ion-label position=\"floating\">Email</ion-label>\n            <ion-input type=\"email\" formControlName=\"email\"></ion-input>\n        </ion-item>\n        <ion-text class=\"ion-padding\" color=\"danger\" *ngIf=\"form.get('email').dirty\">\n            <span *ngIf=\"form.get('email').hasError('required')\">\n                Email is required\n            </span>\n            <span *ngIf=\"form.get('email').hasError('email')\">\n                Email must be valid\n            </span>\n        </ion-text>\n        <br />\n        <ion-item>\n            <ion-label position=\"floating\">Password</ion-label>\n            <ion-input type=\"password\" formControlName=\"password\"></ion-input>\n        </ion-item>\n        <ion-text class=\"ion-padding\" color=\"danger\"\n            *ngIf=\"form.get('password').dirty && form.get('password').hasError('required')\">\n            Password is required\n        </ion-text>\n        <br />\n        <ion-item>\n            <ion-label position=\"floating\">Confirm</ion-label>\n            <ion-input type=\"password\" formControlName=\"confirm\"></ion-input>\n        </ion-item>\n        <ion-text class=\"ion-padding\" color=\"danger\"\n            *ngIf=\"form.get('confirm').dirty &&  form.get('confirm').hasError('confirm')\">\n            Confirm must match\n        </ion-text>\n        <br />\n        <br />\n        <ion-button *ngIf=\"!loadingService.register else loading\" type=\"submit\" [disabled]=\"!form.valid\">Submit\n        </ion-button>\n        <ng-template #loading>\n            <ion-spinner name=\"crescent\"></ion-spinner>\n        </ng-template>\n    </form>\n</ion-content>");

/***/ }),

/***/ "./src/app/authorizations/authorizations-routing.module.ts":
/*!*****************************************************************!*\
  !*** ./src/app/authorizations/authorizations-routing.module.ts ***!
  \*****************************************************************/
/*! exports provided: AuthorizationsRoutingModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AuthorizationsRoutingModule", function() { return AuthorizationsRoutingModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");
/* harmony import */ var _authorizations_component__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./authorizations.component */ "./src/app/authorizations/authorizations.component.ts");
/* harmony import */ var _login_login_component__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./login/login.component */ "./src/app/authorizations/login/login.component.ts");
/* harmony import */ var _register_register_component__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./register/register.component */ "./src/app/authorizations/register/register.component.ts");






const routes = [
    {
        path: '',
        component: _authorizations_component__WEBPACK_IMPORTED_MODULE_3__["AuthorizationsComponent"],
        children: [
            {
                path: 'login',
                component: _login_login_component__WEBPACK_IMPORTED_MODULE_4__["LoginComponent"]
            },
            {
                path: 'register',
                component: _register_register_component__WEBPACK_IMPORTED_MODULE_5__["RegisterComponent"]
            },
            {
                path: '**',
                redirectTo: 'login'
            }
        ],
    }
];
let AuthorizationsRoutingModule = class AuthorizationsRoutingModule {
};
AuthorizationsRoutingModule = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"])({
        imports: [_angular_router__WEBPACK_IMPORTED_MODULE_2__["RouterModule"].forChild(routes)],
        exports: [_angular_router__WEBPACK_IMPORTED_MODULE_2__["RouterModule"]]
    })
], AuthorizationsRoutingModule);



/***/ }),

/***/ "./src/app/authorizations/authorizations.component.scss":
/*!**************************************************************!*\
  !*** ./src/app/authorizations/authorizations.component.scss ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiJzcmMvYXBwL2F1dGhvcml6YXRpb25zL2F1dGhvcml6YXRpb25zLmNvbXBvbmVudC5zY3NzIn0= */");

/***/ }),

/***/ "./src/app/authorizations/authorizations.component.ts":
/*!************************************************************!*\
  !*** ./src/app/authorizations/authorizations.component.ts ***!
  \************************************************************/
/*! exports provided: AuthorizationsComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AuthorizationsComponent", function() { return AuthorizationsComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");


let AuthorizationsComponent = class AuthorizationsComponent {
};
AuthorizationsComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
        selector: 'app-users',
        template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./authorizations.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/authorizations/authorizations.component.html")).default,
        styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./authorizations.component.scss */ "./src/app/authorizations/authorizations.component.scss")).default]
    })
], AuthorizationsComponent);



/***/ }),

/***/ "./src/app/authorizations/authorizations.module.ts":
/*!*********************************************************!*\
  !*** ./src/app/authorizations/authorizations.module.ts ***!
  \*********************************************************/
/*! exports provided: AuthorizationsModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AuthorizationsModule", function() { return AuthorizationsModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/__ivy_ngcc__/fesm2015/common.js");
/* harmony import */ var _angular_common_http__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/common/http */ "./node_modules/@angular/common/__ivy_ngcc__/fesm2015/http.js");
/* harmony import */ var _authorizations_component__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./authorizations.component */ "./src/app/authorizations/authorizations.component.ts");
/* harmony import */ var _login_login_component__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./login/login.component */ "./src/app/authorizations/login/login.component.ts");
/* harmony import */ var _register_register_component__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./register/register.component */ "./src/app/authorizations/register/register.component.ts");
/* harmony import */ var _shared_shared_module__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../shared/shared.module */ "./src/app/shared/shared.module.ts");
/* harmony import */ var _shared_interceptors_authorizations_http_interceptor__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./shared/interceptors/authorizations-http.interceptor */ "./src/app/authorizations/shared/interceptors/authorizations-http.interceptor.ts");
/* harmony import */ var _authorizations_routing_module__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./authorizations-routing.module */ "./src/app/authorizations/authorizations-routing.module.ts");










let AuthorizationsModule = class AuthorizationsModule {
};
AuthorizationsModule = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"])({
        declarations: [
            _authorizations_component__WEBPACK_IMPORTED_MODULE_4__["AuthorizationsComponent"],
            _login_login_component__WEBPACK_IMPORTED_MODULE_5__["LoginComponent"],
            _register_register_component__WEBPACK_IMPORTED_MODULE_6__["RegisterComponent"]
        ],
        imports: [
            _angular_common__WEBPACK_IMPORTED_MODULE_2__["CommonModule"],
            _shared_shared_module__WEBPACK_IMPORTED_MODULE_7__["SharedModule"],
            _authorizations_routing_module__WEBPACK_IMPORTED_MODULE_9__["AuthorizationsRoutingModule"]
        ],
        providers: [
            { provide: _angular_common_http__WEBPACK_IMPORTED_MODULE_3__["HTTP_INTERCEPTORS"], useClass: _shared_interceptors_authorizations_http_interceptor__WEBPACK_IMPORTED_MODULE_8__["AuthorizationsHttpInterceptor"], multi: true },
        ]
    })
], AuthorizationsModule);



/***/ }),

/***/ "./src/app/authorizations/login/login-form.service.ts":
/*!************************************************************!*\
  !*** ./src/app/authorizations/login/login-form.service.ts ***!
  \************************************************************/
/*! exports provided: LoginFormService */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "LoginFormService", function() { return LoginFormService; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm2015/forms.js");



let LoginFormService = class LoginFormService {
    constructor(builder) {
        this.builder = builder;
    }
    get() {
        return this.builder.group({
            email: ['', _angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].email],
            password: ['', _angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].required]
        });
    }
};
LoginFormService.ctorParameters = () => [
    { type: _angular_forms__WEBPACK_IMPORTED_MODULE_2__["FormBuilder"] }
];
LoginFormService = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Injectable"])({
        providedIn: 'root'
    })
], LoginFormService);



/***/ }),

/***/ "./src/app/authorizations/login/login.component.scss":
/*!***********************************************************!*\
  !*** ./src/app/authorizations/login/login.component.scss ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiJzcmMvYXBwL2F1dGhvcml6YXRpb25zL2xvZ2luL2xvZ2luLmNvbXBvbmVudC5zY3NzIn0= */");

/***/ }),

/***/ "./src/app/authorizations/login/login.component.ts":
/*!*********************************************************!*\
  !*** ./src/app/authorizations/login/login.component.ts ***!
  \*********************************************************/
/*! exports provided: LoginComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "LoginComponent", function() { return LoginComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");
/* harmony import */ var _login_form_service__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./login-form.service */ "./src/app/authorizations/login/login-form.service.ts");
/* harmony import */ var _shared_services_authorizations_http_service__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../shared/services/authorizations-http.service */ "./src/app/authorizations/shared/services/authorizations-http.service.ts");
/* harmony import */ var _shared_services_loading_service__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../shared/services/loading.service */ "./src/app/authorizations/shared/services/loading.service.ts");






let LoginComponent = class LoginComponent {
    constructor(loadingService, loginFormService, authorizationHttpService, router) {
        this.loadingService = loadingService;
        this.loginFormService = loginFormService;
        this.authorizationHttpService = authorizationHttpService;
        this.router = router;
    }
    ngOnInit() {
        this.form = this.loginFormService.get();
    }
    ionViewDidLeave() {
        if (this.subscription && !this.subscription.closed) {
            this.subscription.unsubscribe();
        }
        this.form.reset();
        this.error = null;
        this.loadingService.login = false;
    }
    login() {
        return this.subscription = this.authorizationHttpService
            .get(this.form.get('email').value, this.form.get('password').value)
            .subscribe(() => this.router.navigate(['/users']), (error) => this.error = error);
    }
};
LoginComponent.ctorParameters = () => [
    { type: _shared_services_loading_service__WEBPACK_IMPORTED_MODULE_5__["LoadingService"] },
    { type: _login_form_service__WEBPACK_IMPORTED_MODULE_3__["LoginFormService"] },
    { type: _shared_services_authorizations_http_service__WEBPACK_IMPORTED_MODULE_4__["AuthorizationsHttpService"] },
    { type: _angular_router__WEBPACK_IMPORTED_MODULE_2__["Router"] }
];
LoginComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
        selector: 'app-login',
        template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./login.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/authorizations/login/login.component.html")).default,
        styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./login.component.scss */ "./src/app/authorizations/login/login.component.scss")).default]
    })
], LoginComponent);



/***/ }),

/***/ "./src/app/authorizations/register/register-form.service.ts":
/*!******************************************************************!*\
  !*** ./src/app/authorizations/register/register-form.service.ts ***!
  \******************************************************************/
/*! exports provided: RegisterFormService */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "RegisterFormService", function() { return RegisterFormService; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm2015/forms.js");
/* harmony import */ var _shared_validators_confirm_validator_directive__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../shared/validators/confirm-validator.directive */ "./src/app/authorizations/shared/validators/confirm-validator.directive.ts");




let RegisterFormService = class RegisterFormService {
    constructor(builder, confirmValidator) {
        this.builder = builder;
        this.confirmValidator = confirmValidator;
    }
    get() {
        return this.builder.group({
            email: ['', [_angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].required, _angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].email]],
            password: ['', _angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].required],
            confirm: ['', [_angular_forms__WEBPACK_IMPORTED_MODULE_2__["Validators"].required, this.confirmValidator]],
        });
    }
};
RegisterFormService.ctorParameters = () => [
    { type: _angular_forms__WEBPACK_IMPORTED_MODULE_2__["FormBuilder"] },
    { type: _shared_validators_confirm_validator_directive__WEBPACK_IMPORTED_MODULE_3__["ConfirmValidator"] }
];
RegisterFormService = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Injectable"])({
        providedIn: 'root'
    })
], RegisterFormService);



/***/ }),

/***/ "./src/app/authorizations/register/register.component.scss":
/*!*****************************************************************!*\
  !*** ./src/app/authorizations/register/register.component.scss ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiJzcmMvYXBwL2F1dGhvcml6YXRpb25zL3JlZ2lzdGVyL3JlZ2lzdGVyLmNvbXBvbmVudC5zY3NzIn0= */");

/***/ }),

/***/ "./src/app/authorizations/register/register.component.ts":
/*!***************************************************************!*\
  !*** ./src/app/authorizations/register/register.component.ts ***!
  \***************************************************************/
/*! exports provided: RegisterComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "RegisterComponent", function() { return RegisterComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/__ivy_ngcc__/fesm2015/router.js");
/* harmony import */ var _shared_services_authorizations_http_service__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../shared/services/authorizations-http.service */ "./src/app/authorizations/shared/services/authorizations-http.service.ts");
/* harmony import */ var _register_form_service__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./register-form.service */ "./src/app/authorizations/register/register-form.service.ts");
/* harmony import */ var _shared_services_loading_service__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../shared/services/loading.service */ "./src/app/authorizations/shared/services/loading.service.ts");






let RegisterComponent = class RegisterComponent {
    constructor(loadingService, registerFormService, authorizationsHttpService, router) {
        this.loadingService = loadingService;
        this.registerFormService = registerFormService;
        this.authorizationsHttpService = authorizationsHttpService;
        this.router = router;
    }
    ngOnInit() {
        this.form = this.registerFormService.get();
    }
    ionViewDidLeave() {
        if (this.subscription && !this.subscription.closed) {
            this.subscription.unsubscribe();
        }
        this.form.reset();
        this.error = null;
        this.loadingService.register = false;
    }
    register() {
        return this.subscription = this.authorizationsHttpService
            .post(this.form.get('email').value, this.form.get('password').value)
            .subscribe(() => this.router.navigate(['/authorizations', 'login']), (error) => this.error = error);
    }
};
RegisterComponent.ctorParameters = () => [
    { type: _shared_services_loading_service__WEBPACK_IMPORTED_MODULE_5__["LoadingService"] },
    { type: _register_form_service__WEBPACK_IMPORTED_MODULE_4__["RegisterFormService"] },
    { type: _shared_services_authorizations_http_service__WEBPACK_IMPORTED_MODULE_3__["AuthorizationsHttpService"] },
    { type: _angular_router__WEBPACK_IMPORTED_MODULE_2__["Router"] }
];
RegisterComponent = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
        selector: 'app-user',
        template: Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! raw-loader!./register.component.html */ "./node_modules/raw-loader/dist/cjs.js!./src/app/authorizations/register/register.component.html")).default,
        styles: [Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__importDefault"])(__webpack_require__(/*! ./register.component.scss */ "./src/app/authorizations/register/register.component.scss")).default]
    })
], RegisterComponent);



/***/ }),

/***/ "./src/app/authorizations/shared/interceptors/authorizations-http.interceptor.ts":
/*!***************************************************************************************!*\
  !*** ./src/app/authorizations/shared/interceptors/authorizations-http.interceptor.ts ***!
  \***************************************************************************************/
/*! exports provided: AuthorizationsHttpInterceptor */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AuthorizationsHttpInterceptor", function() { return AuthorizationsHttpInterceptor; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var rxjs_operators__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! rxjs/operators */ "./node_modules/rxjs/_esm2015/operators/index.js");
/* harmony import */ var src_environments_environment__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! src/environments/environment */ "./src/environments/environment.ts");
/* harmony import */ var _services_loading_service__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../services/loading.service */ "./src/app/authorizations/shared/services/loading.service.ts");





let AuthorizationsHttpInterceptor = class AuthorizationsHttpInterceptor {
    constructor(loading) {
        this.loading = loading;
    }
    intercept(req, next) {
        let action = null;
        if (req.url === src_environments_environment__WEBPACK_IMPORTED_MODULE_3__["environment"].api.authozizations.login) {
            action = 'login';
        }
        else if (req.url === src_environments_environment__WEBPACK_IMPORTED_MODULE_3__["environment"].api.authozizations.register) {
            action = 'register';
        }
        else {
            return next.handle(req);
        }
        this.loading[action] = true;
        return next.handle(req).pipe(Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_2__["catchError"])((error) => {
            let message = 'Invalid Form';
            if (!error.status) {
                message = 'Network Error';
            }
            else if (404 === error.status) {
                message = 'Invalid Credentials';
            }
            else if (409 === error.status) {
                message = error.error['error'];
            }
            else if (500 === error.status) {
                message = 'Server Error';
            }
            throw message;
        }), Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_2__["finalize"])(() => {
            this.loading[action] = false;
        }));
    }
};
AuthorizationsHttpInterceptor.ctorParameters = () => [
    { type: _services_loading_service__WEBPACK_IMPORTED_MODULE_4__["LoadingService"] }
];
AuthorizationsHttpInterceptor = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Injectable"])({
        providedIn: 'root'
    })
], AuthorizationsHttpInterceptor);



/***/ }),

/***/ "./src/app/authorizations/shared/services/authorizations-http.service.ts":
/*!*******************************************************************************!*\
  !*** ./src/app/authorizations/shared/services/authorizations-http.service.ts ***!
  \*******************************************************************************/
/*! exports provided: AuthorizationsHttpService */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AuthorizationsHttpService", function() { return AuthorizationsHttpService; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_common_http__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/common/http */ "./node_modules/@angular/common/__ivy_ngcc__/fesm2015/http.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var rxjs_operators__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! rxjs/operators */ "./node_modules/rxjs/_esm2015/operators/index.js");
/* harmony import */ var src_app_core_services_user_service__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! src/app/core/services/user.service */ "./src/app/core/services/user.service.ts");
/* harmony import */ var src_environments_environment__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! src/environments/environment */ "./src/environments/environment.ts");






let AuthorizationsHttpService = class AuthorizationsHttpService {
    constructor(http, user) {
        this.http = http;
        this.user = user;
    }
    post(email, password) {
        return this.http
            .post(src_environments_environment__WEBPACK_IMPORTED_MODULE_5__["environment"].api.authozizations.register, {
            email: email,
            password: password
        });
    }
    get(email, password) {
        return this.http
            .post(src_environments_environment__WEBPACK_IMPORTED_MODULE_5__["environment"].api.authozizations.login, {
            email: email,
            password: password
        }).pipe(Object(rxjs_operators__WEBPACK_IMPORTED_MODULE_3__["tap"])((data) => this.user.set(data)));
    }
};
AuthorizationsHttpService.ctorParameters = () => [
    { type: _angular_common_http__WEBPACK_IMPORTED_MODULE_1__["HttpClient"] },
    { type: src_app_core_services_user_service__WEBPACK_IMPORTED_MODULE_4__["UserService"] }
];
AuthorizationsHttpService = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_2__["Injectable"])({
        providedIn: 'any'
    })
], AuthorizationsHttpService);



/***/ }),

/***/ "./src/app/authorizations/shared/services/loading.service.ts":
/*!*******************************************************************!*\
  !*** ./src/app/authorizations/shared/services/loading.service.ts ***!
  \*******************************************************************/
/*! exports provided: LoadingService */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "LoadingService", function() { return LoadingService; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");


let LoadingService = class LoadingService {
    constructor() { }
};
LoadingService.ctorParameters = () => [];
LoadingService = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Injectable"])({
        providedIn: 'root'
    })
], LoadingService);



/***/ }),

/***/ "./src/app/authorizations/shared/validators/confirm-validator.directive.ts":
/*!*********************************************************************************!*\
  !*** ./src/app/authorizations/shared/validators/confirm-validator.directive.ts ***!
  \*********************************************************************************/
/*! exports provided: ConfirmValidator */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ConfirmValidator", function() { return ConfirmValidator; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/__ivy_ngcc__/fesm2015/core.js");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/__ivy_ngcc__/fesm2015/forms.js");
var ConfirmValidator_1;



let ConfirmValidator = ConfirmValidator_1 = class ConfirmValidator {
    validate(control) {
        if (!control.dirty) {
            if (this.subscription) {
                this.subscription.unsubscribe();
                this.subscription = null;
            }
            return null;
        }
        if (!this.subscription) {
            this.subscription = control.root.get('password')
                .valueChanges.subscribe(() => control.updateValueAndValidity());
        }
        return control.root.get('password').value !== control.value ? { 'confirm': true } : null;
    }
};
ConfirmValidator = ConfirmValidator_1 = Object(tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"])([
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Injectable"])({
        providedIn: 'root'
    }),
    Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Directive"])({
        selector: '[appConfirm]',
        providers: [{ provide: _angular_forms__WEBPACK_IMPORTED_MODULE_2__["NG_VALIDATORS"], useExisting: ConfirmValidator_1, multi: true }]
    })
], ConfirmValidator);



/***/ })

}]);
//# sourceMappingURL=authorizations-authorizations-module-es2015.js.map