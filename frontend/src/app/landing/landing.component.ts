import { Component } from '@angular/core';

import { NavComponent } from "../nav/nav.component";
import { HeaderComponent } from "../header/header.component";
import { FooterComponent } from "../footer/footer.component";
import { CartaComponent } from "../carta/carta.component";
@Component({
  selector: 'app-landing',
  imports: [NavComponent, HeaderComponent, FooterComponent, CartaComponent],
  templateUrl: './landing.component.html',
  styleUrl: './landing.component.css'
})
export class LandingComponent {

}
