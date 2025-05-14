import { Routes } from '@angular/router';
import { LandingComponent } from './landing/landing.component';
import { NavComponent } from './nav/nav.component';
import { LoginComponent } from './login/login.component';
import { RegisterComponent } from './register/register.component';
import { FooterComponent } from './footer/footer.component';
import { HeaderComponent } from './header/header.component';
import { CartaComponent } from './carta/carta.component';


export const routes: Routes = [
    { path: '', component: LandingComponent },
    { path: 'nav', component: NavComponent },
    { path: 'login', component: LoginComponent },
    { path: 'register', component: RegisterComponent },
    { path: 'footer', component: FooterComponent },
    { path: 'header', component: HeaderComponent },
    { path: 'carta', component: CartaComponent },
];
