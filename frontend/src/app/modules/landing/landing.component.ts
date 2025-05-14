import { Component } from '@angular/core';

import { NavComponent } from "../nav/nav.component";

import { FooterComponent } from "../footer/footer.component";
import { CartaComponent } from "../carta/carta.component";
import { ColeccionComponent } from "../coleccion/coleccion.component";
@Component({
  selector: 'app-landing',
  imports: [NavComponent, FooterComponent, CartaComponent, ColeccionComponent],
  templateUrl: './landing.component.html',
  styleUrl: './landing.component.css'
})
export class LandingComponent {

}
