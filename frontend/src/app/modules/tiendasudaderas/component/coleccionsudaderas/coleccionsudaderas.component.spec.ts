import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ColeccionsudaderasComponent } from './coleccionsudaderas.component';

describe('ColeccionsudaderasComponent', () => {
  let component: ColeccionsudaderasComponent;
  let fixture: ComponentFixture<ColeccionsudaderasComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ColeccionsudaderasComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ColeccionsudaderasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
