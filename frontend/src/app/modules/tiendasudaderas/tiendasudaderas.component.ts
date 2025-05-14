import { Component } from '@angular/core';
import { NavComponent } from "../nav/nav.component";

import { FooterComponent } from "../footer/footer.component";
import { ColeccionsudaderasComponent } from "./component/coleccionsudaderas/coleccionsudaderas.component";

@Component({
  selector: 'app-tiendasudaderas',
  imports: [NavComponent,  FooterComponent, ColeccionsudaderasComponent],
  templateUrl: './tiendasudaderas.component.html',
  styleUrl: './tiendasudaderas.component.css'
})
export class TiendasudaderasComponent {

}
